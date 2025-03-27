<?php

namespace App\Http\Controllers;
use App\Models\Rental;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validate feedback input
        $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'feedback_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Check if feedback already exists for the rental
        $rental = Rental::findOrFail($request->rental_id);
        if ($rental->feedback) {
            return response()->json(['message' => 'Feedback already submitted for this rental'], 400);
        }

        // Create new feedback
        $feedback = Feedback::create([
            'rental_id' => $rental->id,
            'feedback_text' => $request->feedback_text,
            'rating' => $request->rating,
        ]);

        return response()->json(['message' => 'Feedback submitted successfully', 'feedback' => $feedback], 201);
    }
}
