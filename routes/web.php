<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/guest', [GuestController::class, 'showloginguest'])->middleware('guestnotlogin');
Route::post('/guestlogin', [GuestController::class, 'login']);
Route::post('/guestlogout', [GuestController::class, 'logout']);
Route::get('/guestd', [GuestController::class, 'showhome'])->middleware('guestlogin');


// Admin
Route::get('/admin', [AdminController::class, 'showlogin'])->middleware('adminnotlogin');
Route::post('/adminlogin', [AdminController::class, 'login']);
Route::get('/admind', [AdminController::class, 'showdashboard'])->middleware('adminlogin');

Route::get('/adminr', [AdminController::class, 'showregister'])->middleware('adminnotlogin');
Route::post('/adminregister', [AdminController::class, 'register']);

Route::post('/adminlogout', [AdminController::class, 'logout']);

