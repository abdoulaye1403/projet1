<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ChaptersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentCoursesController;

Route::middleware(['auth', 'admin'])->group(function() {
    Route::resource('courses', CoursesController::class);
    Route::resource('teachers', TeachersController::class);
    Route::resource('students', StudentsController::class);
    Route::resource('chapters', ChaptersController::class);
    Route::resource('studentscourses', StudentCoursesController::class);
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
