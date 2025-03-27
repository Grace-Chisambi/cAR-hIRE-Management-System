<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Bill;
use App\Models\Customer;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function createPayment($booking_id)
    {
        // Fetch the booking and associated customer
        $booking = Booking::find($booking_id);
        if (!$booking) {
            return response()->json(['msg' => 'Booking not found'], 404);
        }

        $customer = Customer::find($booking->customer_id);
        if (!$customer) {
            return response()->json(['msg' => 'Customer not found'], 404);
        }

        // Define total amount from the booking
        $total_amount = $booking->total_amount;

        // Create the bill entry
        $bill = Bill::create([
            'booking_id' => $booking_id,
            'amount' => $total_amount,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

   
        // Redirect to the payment URL
        $paymentUrl = "https://in.paychangu.com/web/payment/SC-dizr9f";
        return redirect()->away($paymentUrl);

        Payment::create([
            'bill_id' => $bill->id,
            'amount' => $total_amount,
            'payment_method' => null, // To be updated after payment completion
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function handleCallback($transaction_ref, Request $request)
    {
        Log::info('Payment Callback:', $request->all());

        // Here you would typically update the bill and payment records based on the transaction_ref

        return response()->json(['msg' => 'Payment processed successfully.']);
    }

    private function generateUniqueString()
    {
        return bin2hex(random_bytes(16));
    }
}
