<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('student')->check()) {
            return view('dashboard.student');
        } elseif (Auth::guard('instructor')->check()) {
            return view('dashboard.instructor');
        } elseif (Auth::guard('admin')->check()) {
            return view('dashboard.admin');
        }

        return redirect()->route('login');
    }
} 