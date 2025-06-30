<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use App\Mail\BookingReceiptMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Payment;
use Carbon\CarbonPeriod;
use Spatie\Permission\Models\Role;

class BookingController extends Controller
{ 
    public function index() {
        $roomTypes = RoomType::all();
        $bookings = Booking::all();
        return view('admin.bookings.viewBooking', compact('bookings', 'roomTypes'));
    }

    public function downloadReceipt($bookingId)
    {
        $booking = \App\Models\Booking::where('booking_id', $bookingId)->first();

        if (!$booking) {
            abort(404, 'Booking not found');
        }

        $pdf = Pdf::loadView('emails.receipt_pdf', compact('booking'));
        return $pdf->download('BookingReceipt_' . $booking->booking_id . '.pdf');
        dd($booking); 
    }
    
    public function store(Request $request)
    {
        $latest = Booking::orderBy('booking_id', 'desc')->first();
        $nextId = $latest ? $latest->id + 1 : 1;
        $bookingId = 'BOOK-' . str_pad($nextId, 5, '0', STR_PAD_LEFT); 

        $request->validate([
            'room_type'         => 'required|exists:room_types,room_type',
            'check_in_date'     => 'required|date',
            'check_out_date'    => 'required|date|after:check_in_date',
            'email_confirmation'=> 'required|email',
            'guest_count'       => 'required|string',
            // 'gcash_phone'       => 'required|string|max:11',
            // 'gcash_reference'   => 'required|string|max:255',
            'note'              => 'nullable|string',
        ]);

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        // Get the first available room that matches the type and is not booked during the selected range
        $availableRoom = Room::with('roomType')
            ->where('room_type', $request->room_type)
            ->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                $query->where('check_in_date', '<', $checkOut)
                    ->where('check_out_date', '>', $checkIn);
            })->first();

        if (!$availableRoom) {
            return back()->withErrors(['room_type' => 'No available room for the selected dates.'])->withInput();
        }

        $ratePerNight = $availableRoom->roomType->price;
        $nights = $checkOut->diffInDays($checkIn);
        $subtotal = $ratePerNight * $nights;
        $tax = $subtotal * 0.15;
        $service = 1200;
        $total = $subtotal + $tax + $service;

        
        $userId = Auth::id();
        if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to book.');
}
        logger('User ID is: ' . $userId);
        $booking = Booking::create([
            'booking_id'        => $bookingId,
            'user_id'           => $userId,
            'room_id'           => $availableRoom->room_id,
            'check_in_date'     => $checkIn,
            'check_out_date'    => $checkOut,
            'email_confirmation'=> $request->email_confirmation,
            'guest_count'       => $request->guest_count,
            'note'              => $request->note,
            'total_price'       => $total,
            'status'           => 'Confirmed' 
        ]);

        Mail::to($request->email_confirmation)->send(new BookingReceiptMail($booking));
        session()->flash('booking_id', $booking->id); 

        Payment::create([
            'booking_id'      => $booking->booking_id,
            'payment_method'  => 'GCash',
            'gcash_phone'     => $request->gcash_phone,
            'transaction_number' => $request->gcash_reference,
            'amount'          => $total,
            'status'          => 'paid', 
        ]);

        return redirect()->back()->with([
            'show_modal' => true,
            'booking_id' => $booking->id,
            'modal_data' => [
                'booking_id'  => $bookingId,
                'room_id'     => $availableRoom->room_id,
                'check_in'    => $checkIn->format('F j, Y'),
                'check_out'   => $checkOut->format('F j, Y'),
                'gcash_ref'   => $request->gcash_reference,
                'gcash_phone' => $request->gcash_phone,
                'total_price' => $total,
            ],
        ]);
    }


    public function manualCreate() 
    {
        $roomTypes = RoomType::all();
        return view('admin.bookings.createBooking', compact('roomTypes'));
    }

    public function receptionBookingStore(Request $request) {
        //$roomType = Room::where('room_type', $request->room_type)->pluck('room_type');
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        $availableRoom = Room::where('room_type', $request->room_type)
        ->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
            $query->where('check_in_date', '<', $checkOut)
                ->where('check_out_date', '>', $checkIn);
        })->first();

        $request->validate([
            'first_name'         => 'required|string|max:255',
            'last_name'          => 'required|string|max:255',
            'email_confirmation' => 'required|email|max:255',
            'check_in_date'      => 'required|date',
            'check_out_date'     => 'required|date|after:check_in_date',
            'guest_count'        => 'required|integer|min:1',
            'total_price'             => 'required',
            'payment_method'     => 'required'
        ]);

        if (trim(strtolower($request->payment_method)) === 'cash') {
            $latestPayment = Payment::orderBy('payment_id', 'desc')->first();
            $nextPaymentId = $latestPayment ? $latestPayment->id + 1 : 1;
            $transactionNumber = 'TN-' . str_pad($nextPaymentId, 6, '0', STR_PAD_LEFT);
        } else {
            $transactionNumber = $request->transaction_number;
        }

        $latest = Booking::orderBy('id', 'desc')->first();
        $nextId = $latest ? $latest->id + 1 : 1;
        $bookingId = 'BOOK-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

        $user = User::firstOrCreate(
            ['email' => $request->email_confirmation],
            [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'password'   => Hash::make($request->last_name . $nextId),
            ]
        );
        $user->assignRole('User');

        $booking = Booking::create([
            'booking_id'      => $bookingId,
            'user_id'         => $user->user_id,
            'room_id'         => $availableRoom->room_id,
            'email_confirmation' => $request->email_confirmation,
            'check_in_date'   => $checkIn,
            'check_out_date'  => $checkOut,
            'guest_count'     => $request->guest_count,
            'total_price'     => $request->total_price,
            'status'          => 'Confirmed',
            'note'           => $request->note
        ]);


        Payment::create([
            'booking_id'       => $booking->booking_id,
            'payment_method'   => $request->payment_method,
            'gcash_phone'      => $request->gcash_phone ?: null,
            'transaction_number' => $transactionNumber
        ]);

        //return redirect()->route('admin-bookings')->with('error', 'Booking creation failed!');
        return redirect()->route('admin-bookings')->with('success', 'Booking created successfully!');
    }

    public function roomAvailability(Request $request) {
        $roomTypeId = $request->query('room_type');
        $totalRooms = Room::where('room_type', $roomTypeId)->count();

        $bookings = Booking::whereHas('room', function ($query) use ($roomTypeId) {
        $query->where('room_type', $roomTypeId);
        })
        ->with('room')
        ->get(['check_in_date', 'check_out_date']);

        $dateCounts = [];

        foreach ($bookings as $booking) {
            $current = strtotime($booking->check_in_date);
            $end = strtotime($booking->check_out_date);

            while ($current <= $end) {
                $date = date('Y-m-d', $current);
                if (!isset($dateCounts[$date])) {
                    $dateCounts[$date] = 0;
                }
                $dateCounts[$date]++;
                $current = strtotime('+1 day', $current);
            }
        }

        $unavailableDates = [];
        foreach ($dateCounts as $date => $count) {
            if ($count >= $totalRooms) {
                $unavailableDates[] = $date;
            }
        }

        return response()->json([
            'unavailable_dates' => $unavailableDates
        ]);
    } 

    public function showDeluxeForm()
    {
        return view('booking-form.book-deluxe');
    }

    public function history(Request $request)
    {
        $user = Auth::user();

        $query = Booking::with('room.roomType')
            ->where('user_id', $user->id);

        // Filter by Room Type
        if ($request->room_type) {
            $query->whereHas('room.roomType', function ($q) use ($request) {
                $q->where('room_type', $request->room_type);
            });
        }

        // Filter by Date Range
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('check_in_date', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);
        $roomTypes = RoomType::all(); 
        

        return view('booking-history', compact('bookings', 'roomTypes'));
    } 

    public function userHistory(Request $request)
    {
        $user = Auth::user();   

        $query = Booking::where('user_id', $user->user_id);
        
        

        if ($request->filled('start_date')) {
            $query->whereDate('check_in_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('check_out_date', '<=', $request->end_date);
        }

        if ($request->filled('room_type')) {
            $query->whereHas('room', function ($q) use ($request) {
                $q->where('room_type', $request->room_type);
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);
        $roomTypes = RoomType::all();

        return view('history', compact('bookings', 'roomTypes'));
    }



    public function edit($id)
    {
        $booking = Booking::findorFail($id);

        return view('admin.bookings.editBooking', compact('booking'));
    }

    public function update(Request $request, Booking $booking, )
    {
        $request->validate([
            'status' => 'required',
            'email_confirmation' => 'required',
            'guest_count' => 'required'
        ]);

        try {
            $booking->update([
                'status' => $request->status,
                'email_confirmation' => $request->email_confirmation,
                'guest_count' => $request->guest_count
            ]);


            return redirect()->route('admin-bookings')->with('success', 'Booking updated.');
        } catch (\Exception $e) {
            return redirect()->route('admin-bookings')->with('error', 'Failed to update booking.');
        }

        // $booking->update([
        //     'user_id' => $request->user_id,
        //     'room_id' => $request->room_id,
        //     'payment_id' => $request->payment_id,
        // ]);

        // return redirect()->route('admin-bookings')->with('success', 'Booking updated.');
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:Confirmed,Checked In,Checked Out',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Booking status updated.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        try {
            $booking->delete();
            return redirect()->route('admin-bookings')->with('success', 'Booking deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin-bookings')->with('error', 'Failed to delete booking.');
        }
    }

}
