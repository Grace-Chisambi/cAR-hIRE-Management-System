<?php

namespace App\Services;

use App\Models\Car;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


namespace App\Services;

use App\Models\Car;

class CartService
{
    public function getCartItems()
    {
        $cart = session()->get('cart', []);  // Assuming cart is stored in session as ['car_id' => quantity]

        // Fetch car details for each item in the cart
        $carIds = array_keys($cart);
        $cars = Car::whereIn('id', $carIds)->get();

        // Attach quantity to each car object for easy access in the view
        foreach ($cars as $car) {
            $car->quantity = $cart[$car->id] ?? 1;
        }

        return $cars;  // This will be a collection of Car models, each with a `quantity` attribute
    }

}
