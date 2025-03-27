@extends('layouts.app')

@section('content')
<!-- Breadcrumb Area -->
<section class="breadcrumb-area style2" style="background-image: url('images/bg_2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content-box clearfix">
                    <div class="title-s2 text-center">
                        <span></span>
                        <h1>Choose Your Perfect Ride</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cart-area">
    <div class="col-lg-8">
        <form action="{{ route('cars.search') }}" method="GET" class="search-form">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search for cars (e.g., make, model)">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger">Search</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header" style="background-color: #f4f4f4; color: #333; font-weight: bold;">
                            <tr>
                                <th style="padding: 15px;">Car Image</th>
                                <th style="padding: 15px;">Details</th>
                                <th style="padding: 15px;">Price per Day</th>
                                <th style="padding: 15px;">Rental Duration</th>
                                <th style="padding: 15px;">Availability</th>
                                <th style="padding: 15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cars->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No cars available.</td>
                                </tr>
                            @else
                                @foreach($cars as $car)
                                    <tr>
                                        <td>
                                            @if(!empty($car->image_url))
                                                <img src="{{ asset($car->image_url) }}" alt="{{ htmlspecialchars($car->model) }}" style="width: 180px;">
                                            @else
                                                <p>No image available.</p>
                                            @endif
                                        </td>
                                        <td>
                                            <h3>{{ $car->make }} {{ $car->model }}</h3>
                                            <p>{{ $car->description }}</p>
                                        </td>
                                        <td>MK{{ number_format($car->daily_rate, 2) }}</td>
                                        <td>
                                            <input type="number" name="rental_duration[{{ $car->car_id }}]" min="0" placeholder="Days" class="form-control rental-duration" style="width: 80px;" data-rate="{{ $car->daily_rate }}">
                                        </td>
                                        <td>
                                            <span class="icon fa {{ $car->available ? 'fa-check thm-bg-clr' : 'fa-times thm-bg-clr' }}"></span>
                                            {{ $car->available ? 'Available' : 'Not Available' }}
                                        </td>
                                        <td>
                                            <button class="btn btn-danger add-to-cart" data-car-id="{{ $car->car_id }}"
                                                    data-daily-rate="{{ $car->daily_rate }}" style="background-color: #e51811; border: none; color: #fff; padding: 8px 15px; font-weight: bold;">
                                                Add to Cart
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <section class="cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                            @csrf
                            <input type="hidden" name="car_id" id="car_id" value=""> <!-- Hidden input for car ID -->
                            <input type="hidden" name="total_amount" id="total_amount" value=""> <!-- Hidden input for total amount -->

                            <div class="form-group">
                                <label for="pickup_date">Pickup Date:</label>
                                <input type="date" id="pickup_date" name="pickup_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="return_date">Return Date:</label>
                                <input type="date" id="return_date" name="return_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="license_number">License Number:</label>
                                <input type="text" id="license_number" name="license_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>

                            <button type="submit" class="btn-one checkout-btn">Proceed Booking</button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <div class="cart-total mt-4">
                            <h4>Cart Totals</h4>
                            <p id="subtotal">Subtotal: MK0.00</p>
                            <p id="total">Total: MK0.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const carId = this.getAttribute('data-car-id'); // Get the car ID from the button
            const rentalDurationInput = document.querySelector(`input[name="rental_duration[${carId}]"]`);

            if (!rentalDurationInput) {
                console.error(`Rental duration input not found for car ID: ${carId}`);
                alert('Please enter a rental duration.');
                return;
            }

            const rentalDuration = parseInt(rentalDurationInput.value) || 0;

            // Calculate total based on existing logic
            const durationInputs = document.querySelectorAll('.rental-duration');
            let total = 0;
            durationInputs.forEach(input => {
                const dailyRate = parseFloat(input.dataset.rate);
                const days = parseInt(input.value) || 0;
                total += dailyRate * days;
            });

            // Update the displayed totals
            updateTotals();

            // Set the car_id and total_amount in the hidden inputs for the checkout form
            document.getElementById('car_id').value = carId; // Update the hidden input with the selected car ID
            document.getElementById('total_amount').value = total.toFixed(2); // Set the total amount

            // Debugging: Log the values being set
            console.log(`Car ID set to: ${carId}`);
            console.log(`Total amount set to: ${total.toFixed(2)}`);

            // Optionally, you can show a message that the car has been added to the cart
            alert(`Car ID ${carId} has been added to the cart.`);
        });
    });

    const durationInputs = document.querySelectorAll('.rental-duration');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');

    function updateTotals() {
        let total = 0;
        durationInputs.forEach(input => {
            const dailyRate = parseFloat(input.dataset.rate);
            const days = parseInt(input.value) || 0;
            total += dailyRate * days;
        });

        subtotalElement.textContent = `Subtotal: MK${total.toFixed(2)}`;
        totalElement.textContent = `Total: MK${total.toFixed(2)}`;
    }

    // Call updateTotals on page load to ensure the totals are accurate
    updateTotals();

    // Handle form submission
    const checkoutForm = document.getElementById('checkout-form');
    checkoutForm.addEventListener('submit', function (e) {
        const carId = document.getElementById('car_id').value;
        const totalAmount = document.getElementById('total_amount').value; // Get the total amount
        const pickupDate = document.getElementById('pickup_date').value;
        const returnDate = document.getElementById('return_date').value;
        const licenseNumber = document.getElementById('license_number').value;
        const phone = document.getElementById('phone').value;

        // Check if all required fields are filled
        if (!carId || !totalAmount || !pickupDate || !returnDate || !licenseNumber || !phone) {
            alert('Please fill in all required fields.');
            e.preventDefault(); // Prevent form submission
            return;
        }

        // Debugging: Log the form data
        console.log({
            car_id: carId,
            total_amount: totalAmount,
            pickup_date: pickupDate,
            return_date: returnDate,
            license_number: licenseNumber,
            phone: phone
        });
    });
});

</script>

@endsection
