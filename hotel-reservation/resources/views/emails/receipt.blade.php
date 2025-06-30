@component('mail::message')
# Booking Confirmation

Thank you for booking with The Haven!

**Booking ID:** {{ $booking->booking_id }}  
**Room ID:** {{ $booking->room_id }}  
**Check-in:** {{ \Carbon\Carbon::parse($booking->check_in_date)->format('F j, Y') }}  
**Check-out:** {{ \Carbon\Carbon::parse($booking->check_out_date)->format('F j, Y') }}  
**Guests:** {{ $booking->guest_count }}  
**Total Price:** ₱{{ number_format($booking->total_price, 2) }}

We'll contact you shortly to confirm the payment.

Thanks,<br>
**The Haven Team**
@endcomponent