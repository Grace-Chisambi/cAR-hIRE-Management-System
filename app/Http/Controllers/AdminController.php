<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    // Count the total number of customers
    $totalCustomers = User::count();

    // Calculate the registration percentage (you can adjust this as needed)
    $registrationPercentage = $totalCustomers > 0 ? (User::whereNotNull('created_at')->count() / $totalCustomers) * 100 : 0;

    // Fetch monthly registrations for the current year
    $monthlyRegistrations = User::selectRaw("MONTH(created_at) as month, COUNT(*) as count")
                                ->whereYear('created_at', date('Y'))
                                ->groupBy('month')
                                ->orderBy('month')
                                ->get()
                                ->pluck('count', 'month')
                                ->toArray();

    // Fill missing months with zero registrations
    $registrationsData = [];
    for ($i = 1; $i <= 12; $i++) {
        $registrationsData[] = $monthlyRegistrations[$i] ?? 0;
    }

    return view('admin', compact('totalCustomers', 'registrationPercentage', 'registrationsData'));
}
}