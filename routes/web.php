<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CoursesController::class,"index"])->name("index");
Route::group(['prefix' => 'courses', 'as' => 'courses.'], function() {
    Route::controller(CoursesController::class)->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::put('{course}/show', 'show')->name('show');
        Route::get('{course}/edit', 'edit')->name('edit');
        Route::put('{course}', 'update')->name('update');
        Route::delete('{course}/delete', 'destroy')->name('destroy');
    });
});

