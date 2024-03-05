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

Route::post('/listing', [ListingController::class, 'create']);
Route::get('/listings', [ListingController::class, 'all']);
Route::post('/listing/{id}', [ListingController::class, 'getById']);
Route::post('/listings/find/{key}', [ListingController::class, 'find']);
