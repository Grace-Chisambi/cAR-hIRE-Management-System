<?php

namespace App\Http\Controllers;

use App\Mail\CustomerNotification; // Import your Mailable
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendBookingConfirmation($customerData)
    {
        // Send the email using the CustomerNotification Mailable
        Mail::to($customerData['email'])->send(new CustomerNotification($customerData));
    }
}
