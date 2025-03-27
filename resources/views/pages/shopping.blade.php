@extends('layouts.app')
@section('content')

<!-- Car Rental Header -->
<section class="cars-style1-area" style="background-image: url('images/bg_3.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix text-center">
                    <div class="title-s2">
                        <h1>Car Rental Selection</h1>
                        <p>Choose the perfect cars for your occasion</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Car Selection Area -->
<section class="car-selection-area">
    <div class="container">
        <div class="row">
            <!-- Example Car Item -->
            @foreach($cars as $car) <!-- Assuming you pass $cars from the controller -->
            <div class="col-md-4 mb-4">
                <div class="car-card">
                    <div class="car-image">
                        <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" style="width:100%;">
                    </div>
                    <div class="car-info text-center">
                        <h3>{{ $car->name }}</h3>
                        <p>{{ $car->description }}</p>
                        <p class="price"><strong>Price per day: ${{ $car->price }}</strong></p>
                        <button class="btn btn-primary add-to-cart-btn" data-id="{{ $car->id }}">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Cart Summary -->
<section class="cart-summary">
    <div class="container">
        <h2>Cart Summary</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Quantity</th>
                    <th>Price per day</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Dynamically updated with JS -->
            </tbody>
        </table>
        <button class="btn btn-success" id="checkout-btn">Proceed to Checkout</button>
    </div>
</section>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cart = {};
    const cartTable = document.getElementById('cart-items');

    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const carId = this.getAttribute('data-id');
            if (!cart[carId]) cart[carId] = { quantity: 0, ...this.dataset };
            cart[carId].quantity++;

            renderCart();
        });
    });

    function renderCart() {
        cartTable.innerHTML = Object.keys(cart).map(id => {
            const { name, price, quantity } = cart[id];
            const total = (price * quantity).toFixed(2);
            return `<tr>
                        <td>${name}</td>
                        <td>${quantity}</td>
                        <td>$${price}</td>
                        <td>$${total}</td>
                        <td><button data-id="${id}" class="remove-btn">Remove</button></td>
                    </tr>`;
        }).join('');
    }

    cartTable.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-btn')) {
            delete cart[e.target.getAttribute('data-id')];
            renderCart();
        }
    });
});
</script>
