<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;


// Admin
Route::get('/admin', [AdminController::class, 'showlogin'])->middleware('adminnotlogin');
Route::post('/adminlogin', [AdminController::class, 'login']);
Route::get('/admind', [AdminController::class, 'showdashboard'])->middleware('adminlogin');

Route::get('/adminr', [AdminController::class, 'showregister'])->middleware('adminnotlogin');
Route::post('/adminregister', [AdminController::class, 'register']);

Route::post('/adminlogout', [AdminController::class, 'logout']);

// Guest
Route::get('/ghome', [GuestController::class, 'showhome']);

Route::get('/glogin', [GuestController::class, 'showlogin'])->middleware('guestnotlogin');
Route::post('/glogin', [GuestController::class, 'login']);

Route::get('/groom', [GuestController::class, 'showroom']);

Route::get('/gtrain', [GuestController::class, 'showtrain']);

Route::get('/gabout', [GuestController::class, 'showabout']);

Route::post('/glogout', [GuestController::class, 'logout']);

