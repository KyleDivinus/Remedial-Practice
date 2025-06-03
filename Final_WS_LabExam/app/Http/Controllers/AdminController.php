<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Course;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (session('role') !== 'admin') return redirect('/');

        $feedbacks = Feedback::with('student', 'instructor')->get();

        return view('admin.dashboard', compact('feedbacks'));
    }

    public function deleteFeedback($id)
    {
        if (session('role') !== 'admin') return redirect('/');

        Feedback::destroy($id);
        return back()->with('success', 'Feedback deleted.');
    }

    public function search(Request $request)
{
    if (session('role') !== 'admin') return redirect('/');

    $keyword = $request->keyword;

    // Find matching students
    $students = Student::where('firstname', 'like', "%$keyword%")
        ->orWhere('lastname', 'like', "%$keyword%")
        ->get();

    // Find matching instructors
    $instructors = Instructor::where('firstname', 'like', "%$keyword%")
        ->orWhere('lastname', 'like', "%$keyword%")
        ->get();

    // Find matching courses
    $courses = Course::where('course_name', 'like', "%$keyword%")->get();

    // Extract IDs to filter feedbacks
    $studentIds = $students->pluck('id')->toArray();
    $instructorIds = $instructors->pluck('id')->toArray();

    // Fetch feedbacks related to those students or instructors
    $feedbacks = Feedback::with('student', 'instructor')
        ->whereIn('sid', $studentIds)
        ->orWhereIn('iid', $instructorIds)
        ->orderBy('date_created', 'desc')
        ->get();

    return view('admin.search', compact('students', 'instructors', 'courses', 'feedbacks', 'keyword'));
}


}
