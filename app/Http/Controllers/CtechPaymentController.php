<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Bill;
use App\Models\Customer;
use Carbon\Carbon;

class CtechPaymentController extends Controller
{
    protected $apiUrl = 'https://api-sandbox.ctechpay.com/student/';
    protected $apiToken = 'ea2c1f13fdbb82e3d0631e7156742d75'; // Replace with your actual API token
    protected $registrationNumber = 'BICTU0822'; // Replace with your actual registration number

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

        // Customer details
        $customer_email = $customer->email;
        $customer_name = $customer->name;

        // Generate unique transaction reference
        $unique_ref = $this->generateUniqueString();

        // Create the order in Ctech Payment Gateway
        $response = Http::post($this->apiUrl . '?endpoint=order', [
            'token' => $this->apiToken,
            'registration' => $this->registrationNumber,
            'amount' => $total_amount,
            'merchantAttributes' => [
                'redirectUrl' => route('payment.return', ['booking_id' => $booking_id]),
                'cancelUrl' => route('payment.cancel'), // Add your cancel URL route
                'cancelText' => 'Cancel Payment',
            ],
        ]);

        if ($response->successful()) {
            $responseData = $response->json();

            // Record the bill
            $bill = Bill::create([
                'booking_id' => $booking_id,
                'amount' => $total_amount,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Record the payment entry
            Payment::create([
                'bill_id' => $bill->id,
                'amount' => $total_amount,
                'payment_method' => 'Ctech', // Set payment method as Ctech
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Redirect to payment page
            return redirect($responseData['payment_page_URL']);
        } else {
            Log::error('Ctech Payment initialization failed', [
                'response' => $response->json(),
                'status' => $response->status(),
            ]);

            return response()->json([
                'msg' => 'Payment initialization failed',
                'error' => $response->json(),
            ], $response->status());
        }
    }

    public function handleCallback($transaction_ref, Request $request)
    {
        Log::info('Payment Callback:', $request->all());

        // Here you would typically check the payment status with the Ctech API
        // For example, using the order reference to check if payment was successful
        // Update the bill and payment records based on the transaction_ref

        // Example of checking the order status
        $response = $this->checkOrderStatus($transaction_ref);

        if ($response['status'] === 'PURCHASED') {
            // Update payment status
            $payment = Payment::where('tx_ref', $transaction_ref)->first();
            if ($payment) {
                $payment->update([
                    'payment_method' => 'Ctech',
                    'updated_at' => Carbon::now(),
                ]);
            }

            return response()->json(['msg' => 'Payment processed successfully.']);
        }

        return response()->json(['msg' => 'Payment not completed.'], 400);
    }

    public function checkOrderStatus($orderRef)
    {
        $response = Http::post($this->apiUrl . 'status/', [
            'token' => $this->apiToken,
            'registration' => $this->registrationNumber,
            'orderRef' => $orderRef,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        Log::error('Failed to check order status', [
            'response' => $response->json(),
            'status' => $response->status(),
        ]);

        return ['error' => 'Failed to check order status'];
    }

    public function createAirtelPayment(Request $request)
    {
        $amount = $request->input('amount');
        $phone = $request->input('phone');

        // Create Airtel payment
        $response = Http::post($this->apiUrl . 'mobile/', [
            'airtel' => 1,
            'token' => $this->apiToken,
            'registration' => $this->registrationNumber,
            'amount' => $amount,
            'phone' => $phone,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Failed to create Airtel payment'], 500);
    }

    private function generateUniqueString()
    {
        return bin2hex(random_bytes(16));
    }
}
