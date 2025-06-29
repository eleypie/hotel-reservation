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
        return view('admin.bookings', compact('bookings', 'roomTypes'));
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
            'room_id'            => 'required|exists:rooms,room_id',
            'daterange'          => 'required|string',
            'email_confirmation' => 'required|email',
            'guest_count'        => 'required|string',
            'gcash_phone'        => 'required|string|max:11',
            'gcash_reference'    => 'required|string|max:255',
            'note'               => 'nullable|string'
        ]);

        
        [$start, $end] = explode(' - ', $request->daterange);
        try {
            $checkIn  = Carbon::createFromFormat('m/d/Y', trim($start));
            $checkOut = Carbon::createFromFormat('m/d/Y', trim($end));
        } catch (\Exception $e) {
            return back()->withErrors(['daterange' => 'Invalid date format'])->withInput();
        }

        $nights = $checkOut->diffInDays($checkIn);

        $room = Room::with('roomType')->findOrFail($request->room_id);
        $ratePerNight = $room->roomType->price;

        $subtotal = $ratePerNight * $nights;
        $tax      = $subtotal * 0.15;
        $service  = 1200;
        $total    = $subtotal + $tax + $service;

        $userId = null;
        if (Auth::check() && Auth::user()->role === 'User') {
            $userId = Auth::id();
        }

        $booking  = Booking::create([
            'booking_id'       => $bookingId,
            'user_id'          => $userId,
            'room_id'          => $request->room_id,
            'check_in_date'    => $checkIn,
            'check_out_date'   => $checkOut,
            'email_confirm'    => $request->email,
            'guest_count'      => $request->guest_count,
            'gcash_phone'      => $request->gcash_phone,
            'gcash_reference'  => $request->gcash_reference,
            'note'             => $request->note,
            'total_price'            => $total
        ]);

        Mail::to($request->email)->send(new BookingReceiptMail($booking));
        session()->flash('booking_id', $booking->id);

        return redirect()->back()->with([
            'show_modal' => true,
            'booking_id' => $booking->id,
            'modal_data' => [
                'booking_id'   => $bookingId, 
                'room_id'      => $request->room_id,
                'check_in'     => $checkIn->format('F j, Y'),
                'check_out'    => $checkOut->format('F j, Y'),
                'gcash_ref'    => $request->gcash_reference,
                'gcash_phone'  => $request->gcash_phone,
                'total_price'        => $total,
            ],
        ]);
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
        ]);

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
            'status'          => 'NOT CHECKED-IN'
        ]);

        $latestPayment = Payment::orderBy('payment_id', 'desc')->first();
        $nextPaymentId = $latestPayment ? $latestPayment->id + 1 : 1;
        $transactionNumber = 'TN-' . str_pad($nextPaymentId, 6, '0', STR_PAD_LEFT);

        Payment::create([
            'booking_id'       => $booking->booking_id,
            'payment_method'   => 'cash',    //change to $request->payment_method later if booking form has it
            'gcash-phone'      => null,
            'transaction_number' => $transactionNumber,
        ]);

        //return redirect()->route('admin-bookings')->with('error', 'Booking creation failed!');
        return redirect()->route('admin-bookings')->with('success', 'Booking created successfully!');
    }

    public function roomAvailability(Request $request) {
        $roomTypeId = $request->query('room_type');

        $bookings = Booking::whereHas('room', function ($query) use ($roomTypeId) {
        $query->where('room_type', $roomTypeId);
        })
        ->with('room')
        ->get(['check_in_date', 'check_out_date']);

        $unavailableDates = [];

        foreach ($bookings as $booking) {
            $current = strtotime($booking->check_in_date);
            $end = strtotime($booking->check_out_date);

            while ($current <= $end) {
                $unavailableDates[] = date('Y-m-d', $current);
                $current = strtotime('+1 day', $current);
            }
        }

        return response()->json([
            'unavailable_dates' => $unavailableDates
        ]);
    }
}
