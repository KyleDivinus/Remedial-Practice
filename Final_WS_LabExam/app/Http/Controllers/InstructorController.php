<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Instructor;

class InstructorController extends Controller
{
    public function dashboard()
    {
        if (session('role') !== 'instructor') return redirect('/');

        $instructorId = session('user_id'); // Or use auth()->id() if using Laravel Auth

        $feedbacks = Feedback::with('student')
            ->where('iid', $instructorId)
            ->orderBy('date_created', 'desc')
            ->get();

        return view('instructor.dashboard', compact('feedbacks'));
    }
}


