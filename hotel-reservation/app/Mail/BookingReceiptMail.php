<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingReceiptMail extends Mailable
{   
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking; 

    public function __construct(Booking $booking)
    {
          $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = Pdf::loadView('emails.receipt_pdf', ['booking' => $this->booking]);

        return $this->subject('Your Booking Receipt - The Haven')
                    ->markdown('emails.receipt')
                    ->attachData($pdf->output(), 'BookingReceipt.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
