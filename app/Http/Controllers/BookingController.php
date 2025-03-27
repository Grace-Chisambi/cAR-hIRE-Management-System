<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function checkout(Request $request)
    {
        $validatedData = $request->validate([
            'pickup_location' => 'required|string',
            'pickup_date' => 'required|date',
            'return_location' => 'required|string',
            'return_date' => 'required|date',
        ]);

        // Log data for debugging
        \Log::info('Checkout Data:', $validatedData);

        $booking = Booking::create([
            'customer_id' => auth()->id(),
            'start_date' => $validatedData['pickup_date'],
            'end_date' => $validatedData['return_date'],
            'pickup_location' => $validatedData['pickup_location'],
            'return_location' => $validatedData['return_location'],
            'total_amount' => $request->input('total_amount', 0),
        ]);

        if ($booking) {
            return response()->json([
                'success' => true,
                'paymentUrl' => route('payment.gateway', ['booking_id' => $booking->id]),
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Booking creation failed.']);
        }
    }


}
//////<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Car;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        \Log::info('Checkout Request Data:', $request->all());

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,car_id', // Validate against the custom primary key
            'total_amount' => 'required|numeric',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'license_number' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            \Log::error('Validation Errors:', $validator->errors()->all());
            return back()->withErrors($validator)->withInput();
        }

        $userId = auth()->id();
        if (!$userId) {
            return back()->with('error', 'User not authenticated.');
        }

        // Find or create the customer
        $customer = Customer::firstOrCreate(
            ['user_id' => $userId],
            [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $request->input('phone'),
                'license_number' => $request->input('license_number'),
            ]
        );

        // Get available cars
        $availableCars = Car::where('available', true)->get();
        $carIds = $availableCars->pluck('car_id')->toArray(); // Use the actual custom primary key

        // Create a booking for the specified car
        $booking = Booking::create([
            'customer_id' => $customer->customer_id,
            'car_id' => $request->input('car_id'),  // Use car_id from request
            'start_date' => $request->input('pickup_date'),
            'end_date' => $request->input('return_date'),
            'total_amount' => $request->input('total_amount'),  // Use total_amount from request
            'start_mileage' => Car::find($request->input('car_id'))->mileage, // Assuming you need mileage here
            'end_mileage' => null,
        ]);

        \Log::info('Booking created:', $booking->toArray());

        // Optionally clear the cart if needed
        session()->forget('cart.items');

        return redirect()->route('payment.gateway')
                         ->with('success', 'Booking created successfully!');
    }



}
