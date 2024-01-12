<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;


// Admin
Route::get('/alogin', [AdminController::class, 'showlogin'])->middleware('adminnotlogin');
Route::post('/alogin', [AdminController::class, 'login']);

Route::get('/adash', [AdminController::class, 'showdashboard'])->middleware('adminlogin');

Route::post('/alogout', [AdminController::class, 'logout']);

// Guest
Route::get('/ghome', [GuestController::class, 'showhome']);
Route::get('/groom', [GuestController::class, 'showroom']);
Route::get('/gtrain', [GuestController::class, 'showtrain']);
Route::get('/gabout', [GuestController::class, 'showabout']);

Route::get('/gregister', [GuestController::class, 'showregister'])->middleware('guestnotlogin');
Route::post('/gregister', [GuestController::class, 'register']);

Route::get('/glogin', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
Route::post('/glogin', [GuestController::class, 'login']);

Route::post('/glogout', [GuestController::class, 'logout']);
