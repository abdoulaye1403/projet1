<?php

use App\Http\Controllers\Api\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [userController::class,'index']);
Route::get('/users/{user}', [userController::class,'show']);
Route::post('/users', [userController::class,'store']);
Route::put('/users/{id}', [userController::class,'update']);
Route::delete('/users/{id}', [userController::class,'destroy']);