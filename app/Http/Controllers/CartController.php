<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\CartService;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function pricing()
    {
        $cars = Car::all();


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

    public function showCart()
{
    // Retrieve the cars from the session
    $cars = session('cars', collect()); // Default to an empty collection if no cars found

    // Calculate the total price
    $totalPrice = $cars->sum(function ($car) {
        return $car['daily_rate'] * $car['rental_duration'];
    });

    return view('cart.pricing', compact('cars', 'totalPrice')); // Assuming you have a view for showing the cart
}




}
