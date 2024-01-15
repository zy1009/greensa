<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


// Admin
Route::get('/alogin', [AdminController::class, 'showlogin'])->middleware('adminnotlogin');
Route::post('/alogin', [AdminController::class, 'login']);

Route::get('/adash', [AdminController::class, 'showdashboard'])->middleware('adminlogin');

Route::post('/alogout', [AdminController::class, 'logout']);

// Guest
Route::get('/ghome', [GuestController::class, 'showhome'])->middleware(['guestlogin'])->name('ghome');
Route::get('/groom', [GuestController::class, 'showroom'])->middleware(['guestlogin', 'verified']);
Route::get('/gtrain', [GuestController::class, 'showtrain'])->middleware(['guestlogin', 'verified']);
Route::get('/gabout', [GuestController::class, 'showabout'])->middleware(['guestlogin', 'verified']);

Route::get('/gregister', [GuestController::class, 'showregister'])->middleware('guestnotlogin');
Route::post('/gregister', [GuestController::class, 'register']);

Route::get('/glogin', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
Route::post('/glogin', [GuestController::class, 'login']);

Route::get('/glogout', [GuestController::class, 'logout']);
Route::post('/glogout', [GuestController::class, 'logout']);

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('guestlogin')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    return view('ghome');
})->middleware(['auth', 'signed'])->name('verification.verify');