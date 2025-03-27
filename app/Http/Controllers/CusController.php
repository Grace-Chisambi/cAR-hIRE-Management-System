<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Correct model import
use Illuminate\Http\Request;

class CusController extends Controller
{
    // Display all customers
    public function index()
    {
        // Retrieve all customers from the 'customers' table
        $customers = Customer::all(); // Fetch all customers
        return view('customer.index', compact('customers')); // Pass the correct variable
    }

    // Store a new customer
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email', // Ensure we're checking uniqueness on customers table
            'phone' => 'required|string',
            'license_number' => 'required|string|unique:customers,license_number', // Validate license number uniqueness
        ]);

        // Create the new customer
        Customer::create([
            'user_id' => auth()->user()->id, // Associating with the logged-in user
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'license_number' => $request->input('license_number'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer added successfully!');
    }

    // Update an existing customer
    public function update(Request $request, $customer_id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer_id, // Unique except for current customer
            'phone' => 'required|string',
            'license_number' => 'required|string|unique:customers,license_number,' . $customer_id, // Unique except for current customer
        ]);

        // Find the customer and update their information
        $customer = Customer::findOrFail($customer_id);
        $customer->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'license_number' => $request->input('license_number'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }

    // Delete a customer
    public function destroy($customer_id)
    {
        // Find and delete the customer
        $customer = Customer::findOrFail($customer_id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }
}
