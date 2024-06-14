<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('home', DashboardController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('galery', GaleryController::class);
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('survei', SurveiController::class);
});
