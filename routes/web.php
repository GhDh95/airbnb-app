<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileListingController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|hi
*/

Route::get('/',[ListingController::class, 'index']);
Route::get('listing/create',[ListingController::class, 'create'])->middleware('auth');
Route::get('/listing/{listing:id}', [ListingController::class, 'show']);
Route::post('/listing/store',[ListingController::class, 'store'])->middleware('auth');
Route::post('/listing/destroy/{listing:id}',[ListingController::class,'destroy'])->middleware('auth');

Route::get('/user/listings',[ProfileListingController::class, 'index'])->middleware('auth');

Route::post('/listing/reservation/{listing:id}',[ReservationController::class, 'store'])->middleware('auth');
Route::get('/user/reservations',[ReservationController::class, 'index'])->middleware('auth');
Route::post('/reservation/destroy/{reservation:id}',[ReservationController::class,'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
