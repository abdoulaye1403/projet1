<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CoursesController::class,"index"])->name("index");
Route::group(['prefix' => 'courses', 'as' => 'courses.'], function() {
    Route::controller(CoursesController::class)->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{course}/show', 'show')->name('show');
        Route::get('{course}/edit', 'edit')->name('edit');
        Route::put('{course}', 'update')->name('update');
        Route::delete('{course}/delete', 'destroy')->name('destroy');
    });
});

Route::resource('teachers', TeachersController::class);
Route::resource('students', StudentsController::class);


