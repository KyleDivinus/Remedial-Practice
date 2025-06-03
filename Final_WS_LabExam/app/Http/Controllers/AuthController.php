<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Admin;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // STUDENT
    public function showStudentLogin() {
        return view('auth.login-student');
    }

    public function loginStudent(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $student = Student::where('username', $request->username)->first();
        if ($student && Hash::check($request->password, $student->password)) {
            session(['role' => 'student', 'user_id' => $student->id]);
            return redirect('/student/dashboard');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function showStudentRegister() {
        $courses = Course::all();
        return view('auth.register-student', compact('courses'));
    }

    public function registerStudent(Request $request) {
        $request->validate([
            'firstname'     => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:students,username',
            'password'      => 'required|string|min:6',
            'course_id'     => 'required|exists:courses,id',
            'date_of_birth' => 'required|date',
            'gender'        => 'required|in:Male,Female',
        ]);

        Student::create([
            'firstname'      => $request->firstname,
            'lastname'       => $request->lastname,
            'username'       => $request->username,
            'password'       => Hash::make($request->password),
            'course_id'      => $request->course_id,
            'date_of_birth'  => $request->date_of_birth,
            'gender'         => $request->gender,
            'aid'            => 3, // Changed to 3 for student role (common convention)
            'date_enrolled'  => now(),
        ]);

        return redirect('/login/student')->with('success', 'Registration successful. Please login.');
    }

    // INSTRUCTOR
    public function showInstructorLogin() {
        return view('auth.login-instructor');
    }

    public function loginInstructor(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $instructor = Instructor::where('username', $request->username)->first();
        if ($instructor && Hash::check($request->password, $instructor->password)) {
            session(['role' => 'instructor', 'user_id' => $instructor->id]);
            return redirect('/instructor/dashboard');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function showInstructorRegister() {
        $courses = Course::all();
        return view('auth.register-instructor', compact('courses'));
    }

    public function registerInstructor(Request $request) {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:instructors,username',
            'password'  => 'required|string|min:6',
        ]);

        Instructor::create([
            'cid'       => $request->course_id,
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'aid'       => 2,
        ]);

        return redirect('/login/instructor')->with('success', 'Registration successful. Please login.');
    }

    // ADMIN
    public function showAdminLogin() {
        return view('auth.login-admin');
    }

    public function loginAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['role' => 'admin', 'user_id' => $admin->id]);
            return redirect('/admin/dashboard');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function showAdminRegister() {
        return view('auth.register-admin');
    }

    public function registerAdmin(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'aid' => 1, // Usually 1 is admin role
        ]);
        return redirect('/login/admin')->with('success', 'Admin registered successfully. Please login.');
    }

    // LOGOUT
    public function logout()
    {
        $role = session('role'); // Get the current role before flushing
        session()->flush();

        // Redirect to the correct login form based on role
        switch ($role) {
            case 'student':
                return redirect('/login/student');
            case 'instructor':
                return redirect('/login/instructor');
            case 'admin':
                return redirect('/login/admin');
            default:
                return redirect('/'); // fallback, or redirect to a general landing page
        }
    }
}
