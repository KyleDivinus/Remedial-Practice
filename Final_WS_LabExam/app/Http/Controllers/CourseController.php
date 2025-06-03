<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|unique:courses,course_name',
        ]);

        Course::create([
            'course_name' => $request->course_name,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }
}
