<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedbackController; // ✅ ADDED

Route::get('/', function () {
    return view('welcome');
});

// ---------- AUTH ROUTES ----------
Route::get('/login/student', [AuthController::class, 'showStudentLogin']);
Route::post('/login/student', [AuthController::class, 'loginStudent']);

Route::get('/register/student', [AuthController::class, 'showStudentRegister']);
Route::post('/register/student', [AuthController::class, 'registerStudent']);

Route::get('/login/instructor', [AuthController::class, 'showInstructorLogin']);
Route::post('/login/instructor', [AuthController::class, 'loginInstructor']);

Route::get('/register/instructor', [AuthController::class, 'showInstructorRegister']);
Route::post('/register/instructor', [AuthController::class, 'registerInstructor']);

Route::get('/login/admin', [AuthController::class, 'showAdminLogin']);
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);

// Admin Register
Route::get('/register/admin', function () {
    return view('auth.register-admin');
});
Route::post('/register/admin', [AuthController::class, 'registerAdmin']);

// ---------- ADMIN COURSE MANAGEMENT ----------
Route::prefix('admin')->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('admin.courses.store');
});

// ---------- DASHBOARD ROUTES ----------
Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
Route::post('/student/feedback/{instructorId}', [FeedbackController::class, 'store']); // ✅ UPDATED

Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/search', [AdminController::class, 'search']);
Route::delete('/admin/feedback/{id}', [AdminController::class, 'deleteFeedback']);

Route::get('/logout', [AuthController::class, 'logout']);
