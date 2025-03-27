@extends('layouts.admin')
@section('content')
    <title>Customer Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen shadow-md">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="bg-green-500 p-2 rounded-full">
                        <i class="fas fa-customer-friends text-white"></i>
                    </div>
                    <span class="ml-2 text-xl font-bold">Customer</span>
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
            <h1 class="text-2xl font-bold mb-6">Customer Management</h1>

            <!-- Add Customer Button -->
            <button onclick="openModal('addCustomerModal')" class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                Add Customer
            </button>

            <!-- Customer Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4">Customer ID</th>
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td class="py-2 px-4">{{ $customer->customer_id }}</td>
                            <td class="py-2 px-4">{{ $customer->name }}</td>
                            <td class="py-2 px-4">{{ $customer->email }}</td>
                            <td class="py-2 px-4 flex space-x-2">
                                <!-- Edit Button -->
                                <button onclick="openEditModal({{ json_encode($customer) }})" class="bg-blue-500 text-white px-2 py-1 rounded">
                                    Edit
                                </button>

                                <!-- Delete Form -->
                                <form action="{{ route('customer.destroy', $customer->customer_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Customer Modal -->
    <div id="addCustomerModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Add Customer</h2>
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Phone</label>
                    <input type="text" name="phone" class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">License Number</label>
                    <input type="text" name="license_number" class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="flex justify-end space-x-4
@endsection
