<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use App\Mail\BookingReceiptMail;

class SendTestBookingMail extends Command
{
    protected $signature = 'test:booking-mail';
    protected $description = 'Send a test booking receipt email to the latest booking email address';

    public function handle()
    {
        $booking = Booking::latest()->first(); // Get the latest booking

        if (!$booking) {
            $this->error('❌ No bookings found. Please create a booking first.');
            return;
        }

        try {
            Mail::to($booking->email)->send(new BookingReceiptMail($booking));
            $this->info('✅ Test booking receipt sent to: ' . $booking->email);
        } catch (\Exception $e) {
            $this->error('❌ Failed to send email: ' . $e->getMessage());
        }
    }
}
