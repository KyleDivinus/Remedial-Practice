<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Feedback;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function dashboard()
    {
        if (session('role') !== 'student') return redirect('/');

        $studentId = session('user_id');
        $instructors = Instructor::with('course')->get();

        return view('student.dashboard', compact('instructors'));
    }

    public function submitFeedback(Request $request, $instructorId)
    {
        if (session('role') !== 'student') return redirect('/');

        $studentId = session('user_id');
        $semester = $request->semester;
        $year = $request->year;

        // Check if feedback already exists for that sem/year
        $exists = Feedback::where('sid', $studentId)
            ->where('iid', $instructorId)
            ->where('semester', $semester)
            ->where('year', $year)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You already submitted feedback to this instructor this semester.');
        }

        Feedback::create([
            'sid' => $studentId,
            'iid' => $instructorId,
            'feedback' => $request->feedback,
            'semester' => $semester,
            'year' => $year,
            'status' => 'Submitted',
        ]);

        return back()->with('success', 'Feedback submitted.');
    }
}
