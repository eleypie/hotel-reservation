@component('mail::message')
# Booking Confirmation

Thank you for booking with The Haven!

**Booking ID:** {{ $booking->booking_id }}  
**Room Type:** {{ $booking->room_type }}  
**Check-in:** {{ \Carbon\Carbon::parse($booking->check_in_date)->format('F j, Y') }}  
**Check-out:** {{ \Carbon\Carbon::parse($booking->check_out_date)->format('F j, Y') }}  
**Guests:** {{ $booking->guest_count }}  
**Total Price:** ₱{{ number_format($booking->price, 2) }}

We'll contact you shortly to confirm the payment.

Thanks,<br>
**The Haven Team**
@endcomponent