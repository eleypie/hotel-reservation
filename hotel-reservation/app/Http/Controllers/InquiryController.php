<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string',
        ]);

        Mail::to('admin@thehaven.com')->send(new InquiryMail($validated));

        return back()->with('success', 'Inquiry sent successfully!');
    }
}
