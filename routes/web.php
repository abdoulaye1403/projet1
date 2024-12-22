<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ChaptersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentCoursesController;

Route::middleware(['auth','AdminMiddleware:admin'])->group(function() {
    Route::resource('courses', CoursesController::class);
    Route::resource('teachers', TeachersController::class);
    Route::resource('students', StudentsController::class);
    Route::resource('studentscourses', StudentCoursesController::class);
});

Route::middleware(['auth','TeacherMiddleware:teacher'])->group(function() {
    Route::resource('courses', CoursesController::class)->except(['index','show']);
    Route::get('teachers/{teacher}/courses', [TeachersController::class, 'showCourses'])->name('teachers.courses');
});

Auth::routes();
Route::resource('courses.chapters', ChaptersController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/course/{course}', [HomeController::class, 'show'])->name('show_course');
