<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{ 
    
   public function store(Request $request)
{

    $latest = Booking::orderBy('id', 'desc')->first();
    $nextId = $latest ? $latest->id + 1 : 1;
    $bookingId = 'BOOK-' . str_pad($nextId, 5, '0', STR_PAD_LEFT); 

    $request->validate([
        'room_type'        => 'required|string',
        'daterange'        => 'required|string',
        'email'            => 'required|email',
        'guest_count'      => 'required|string',
        'gcash_phone'      => 'required|string|max:11',
        'gcash_reference'  => 'required|string|max:255',
        'note'             => 'nullable|string'
    ]);

    // Parse the date range (mm/dd/yyyy - mm/dd/yyyy)
    [$start, $end] = explode(' - ', $request->daterange);
    try {
        $checkIn  = Carbon::createFromFormat('m/d/Y', trim($start));
        $checkOut = Carbon::createFromFormat('m/d/Y', trim($end));
    } catch (\Exception $e) {
        return back()->withErrors(['daterange' => 'Invalid date format'])->withInput();
    }

    $nights = $checkOut->diffInDays($checkIn);

    // Match lowercase room types
    $rates = [
        'deluxe'     => 3200,
        'family'     => 6800,
        'superior'   => 3800,
        'premier'    => 5000,
        'executive'  => 7500,
        'honeymoon'  => 8200,
    ];
    $ratePerNight = $rates[strtolower($request->room_type)] ?? 5500;

    // Compute pricing
    $subtotal = $ratePerNight * $nights;
    $tax      = $subtotal * 0.15;
    $service  = 1200;
    $total    = $subtotal + $tax + $service;

    // Save booking
    Booking::create([
        'booking_id'       => $bookingId,
        'room_type'        => $request->room_type,
        'check_in_date'    => $checkIn,
        'check_out_date'   => $checkOut,
        'email'            => $request->email,
        'guest_count'      => $request->guest_count,
        'gcash_phone'      => $request->gcash_phone,
        'gcash_reference'  => $request->gcash_reference,
        'note'             => $request->note,
        'price'            => $total
    ]);

    return redirect()->back()->with([
    'show_modal' => true,
    'modal_data' => [
        'booking_id'   => $bookingId, 
        'room_type'    => $request->room_type,
        'check_in'     => $checkIn->format('F j, Y'),
        'check_out'    => $checkOut->format('F j, Y'),
        'gcash_ref'    => $request->gcash_reference,
        'gcash_phone'  => $request->gcash_phone,
        'price'        => $total,
    ],
]);
}

}
