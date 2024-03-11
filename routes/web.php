<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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
Route::get('/listing', [ListingController::class, 'showCreate'])->name('listings.create');
Route::post('/listing', [ListingController::class, 'create'])->name('listings.store');
Route::get('/listing/{id}', [ListingController::class, 'getById'])->name('listings.details');
