<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request, $instructorId)
{
    $request->validate([
        'message' => 'required|string|max:1000',
        'semester' => 'required|string',
        'year' => 'required|integer',
    ]);

    $studentId = session('user_id'); // or Auth::id() if using Laravel auth

    // Check if feedback already exists for the same instructor, semester and year
    $exists = Feedback::where('sid', $studentId)
        ->where('iid', $instructorId)
        ->where('semester', $request->semester)
        ->where('year', $request->year)
        ->exists();

    if ($exists) {
        return back()->with('error', 'You have already submitted feedback for this instructor this semester.');
    }

    Feedback::create([
        'sid' => $studentId,
        'iid' => $instructorId,
        'feedback' => $request->message,
        'semester' => $request->semester,
        'year' => $request->year,
        'status' => 'Submitted',
        'date_created' => now(),
    ]);

    return redirect('/student/dashboard')->with('success', 'Feedback submitted successfully.');
}

}
