<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Display all staff members
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    // Store a new staff member
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:staff,email',
        'role' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    \Log::info('Request data:', $request->all()); // Log the input data for debugging

    Staff::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
        'password' => bcrypt($request->input('password')),
    ]);

    return dd('Staff member added successfully');

}


    // Show the form for editing a specific staff member
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return response()->json($staff); // Return data as JSON for dynamic population
    }

    // Update an existing staff member
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $id, // Allow the same email for the current staff
            'role' => 'required|string',
            'password' => 'nullable|string|min:8', // Password is optional but must be at least 8 characters if provided
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $staff->password, // Update password only if provided
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    // Delete a staff member
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
