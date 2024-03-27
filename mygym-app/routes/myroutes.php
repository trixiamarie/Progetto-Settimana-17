<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('/course', CoursesController::class);

Route::resource('/booking', BookingController::class);

Route::resource('/user', UserController::class);
