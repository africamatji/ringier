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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listing', [ListingController::class, 'show'])->name('listings.create');
Route::post('/listings/create', [ListingController::class, 'create'])->name('listings.store');
Route::get('/listings/all', [ListingController::class, 'all']);
Route::post('/listing/{id}', [ListingController::class, 'getById']);
Route::post('/listings/find/{key}', [ListingController::class, 'find']);
