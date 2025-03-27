@extends('layouts.admin')
@section('content')

    <title>YEWO CAR HIRE Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen shadow-md">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="bg-green-500 p-2 rounded-full">
                        <i class="fas fa-user-shield text-white"></i> <!-- Admin icon -->
                    </div>
                    <span class="ml-2 text-xl font-bold">Admin</span>
                </div>
            </div>
            <nav class="mt-10">
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('admin.index') }}">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('staff.index') }}">
                    <i class="fas fa-users mr-2"></i> Staff
                </a>
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('customer.index') }}">
                    <i class="fas fa-user-friends mr-2"></i> Customers
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

            <!-- Stats Summary -->
            <div class="grid grid-cols-3 gap-4 mb-8">
                <!-- Staff Count -->
                <a href="{{ route('staff.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100 transition duration-200">
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-full">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-bold">Staff</h3>
                            <p class="text-2xl"></p>
                        </div>
                    </div>
                </a>

                <!-- Replace hardcoded values with dynamic data from the controller -->
<a href="{{ route('customer.index') }}" class="bg-white p-6 rounded-lg shadow-md hover:bg-gray-100 transition duration-200">
    <div class="flex items-center">
        <div class="bg-green-500 p-3 rounded-full">
            <i class="fas fa-user-friends text-white"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-xl font-bold">Customers</h3>
            <p class="text-2xl">{{ $totalCustomers }}</p>
        </div>
    </div>
</a>

<!-- Registration Summary -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex items-center">
        <div class="bg-purple-500 p-3 rounded-full">
            <i class="fas fa-chart-line text-white"></i>
        </div>
        <div class="ml-4">
            <h3 class="text-xl font-bold">Registrations</h3>
            <p class="text-2xl">{{ round($registrationPercentage, 2) }}%</p>
        </div>
    </div>
</div>

<!-- Registration Graph -->
 <!-- Registration Graph -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-4">Customer Registrations Over Time</h3>
    <div style="max-width: 600px; margin: auto;">
        <canvas id="registrationChart"></canvas> <!-- This canvas element is needed -->
    </div>
</div>

<script>

    console.log(typeof Chart); // Should log "function" if Chart.js is loaded correctly


    console.log(@json($registrationsData)); // Temporarily check if data is available


    document.addEventListener('DOMContentLoaded', function () { // Ensure the DOM is loaded before running the script
        const ctx = document.getElementById('registrationChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Registrations',
                    data: @json($registrationsData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { title: { display: true, text: 'Months' }},
                    y: {
                        title: { display: true, text: 'Number of Registrations' },
                        beginAtZero: true
                    }
                }
            }
        });
    });

</script>

</body>
</html>
@endsection
