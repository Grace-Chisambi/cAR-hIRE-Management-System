<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Hello, {{ $data['customer_name'] }}</h1>
    <p>{{ $data['message'] }}</p>
    <h2>Congraturations:</h2>
    <h2>Your Booking Details:</h2>
    <p><strong>Booking ID:</strong> {{ $data['message'] }}</p>
    <p><strong>Total Amount:</strong> ${{ number_format($data['total_amount'], 2) }}</p>

    <h3>Car Image:</h3>
    <img src="{{ $data['car_image'] }}" alt="Car Image" style="max-width: 300px; height: auto;">

    <p>Thank you for choosing us!</p>
</body>
</html>
