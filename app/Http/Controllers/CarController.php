<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function pricing()
    {
        $cars = session('cars', collect()); // Default to an empty collection if no cars found

        return view('cart.pricing', compact('cars'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $cars = Car::where('make', 'LIKE', "%{$query}%")
                    ->orWhere('model', 'LIKE', "%{$query}%")
                    ->orWhere('capacity', 'LIKE', "%{$query}%")
                    ->get();

        // Store the cars in the session
        session(['cars' => $cars]);

        // Redirect to the pricing page
        return redirect()->route('cart.pricing');
    }
    public function addToCart(Request $request)
    {
        $carId = $request->input('car_id');
        $rentalDuration = $request->input('rental_duration');
        $car = Car::find($carId);

        if ($car && $car->available) {
            $totalAmount = $car->daily_rate * $rentalDuration;

            // Add to session or temporary cart service
            session()->push('cart.items', [
                'car_id' => $car->id,
                'make' => $car->make,
                'model' => $car->model,
                'daily_rate' => $car->daily_rate,
                'rental_duration' => $rentalDuration,
                'total' => $totalAmount,
            ]);

            return response()->json(['success' => true, 'message' => 'Car added to cart', 'total' => $totalAmount]);
        }
        return response()->json(['success' => false, 'message' => 'Car unavailable']);
    }




}


