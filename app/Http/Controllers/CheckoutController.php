<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Car;
use App\Http\Controllers\CtechPaymentController; // Import the CtechPaymentController
use App\Http\Controllers\MailController; // Import the MailController
use App\Mail\CustomerNotification; // Import your Mailable
use Illuminate\Support\Facades\Mail; // Import the Mail facade

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        \Log::info('Checkout Request Data:', $request->all());

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,car_id',
            'total_amount' => 'required|numeric',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'license_number' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            \Log::error('Validation Errors:', $validator->errors()->all());
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['success' => false, 'error' => 'User not authenticated.'], 401);
        }

        // Find or create the customer based on user ID
        $customer = Customer::firstOrCreate(
            ['user_id' => $userId],
            [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $request->input('phone'),
                'license_number' => $request->input('license_number'),
            ]
        );

        try {
            $car = Car::findOrFail($request->input('car_id'));
            $booking = Booking::create([
                'customer_id' => $customer->customer_id,
                'car_id' => $car->car_id,
                'start_date' => $request->input('pickup_date'),
                'end_date' => $request->input('return_date'),
                'total_amount' => $request->input('total_amount'),
                'start_mileage' => $car->current_mileage,
                'end_mileage' => null,
            ]);

            \Log::info('Booking created:', $booking->toArray());

        // Prepare the customer data for the email
$carImage = $car->image_url; // Adjust this based on your Car model's image field
$totalAmount = $request->input('total_amount');

$customerData = [
    'email' => $customer->email,
    'customer_name' => $customer->name,
    'message' => 'Thank you for your booking! Your booking ID is ' . $booking->booking_id,
    'car_image' => $carImage,
    'total_amount' => $totalAmount,
];


            // Send the email directly using Mail facade
            Mail::to($customerData['email'])->send(new CustomerNotification($customerData));

            session()->forget('cart.items');

            return redirect()->route('payment.createPayment', ['booking_id' => $booking->booking_id]);

        } catch (\Exception $e) {
            \Log::error('Error creating booking: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Could not create Payment.'], 500);
        }
    }
}


