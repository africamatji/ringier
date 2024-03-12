<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [ListingController::class, 'index'])->name('listings.home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/callback', [AuthController::class, 'handleCallback'])->name('auth.callback');

Route::get('/listing', [ListingController::class, 'showCreate'])
    ->middleware('auth')
    ->name('listings.create');
Route::post('/listing', [ListingController::class, 'create'])
    ->name('listings.store');
Route::get('/listing/{listing:slug}', [ListingController::class, 'getListing'])
    ->name('listings.details');
