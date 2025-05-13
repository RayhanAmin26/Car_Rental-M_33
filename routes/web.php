<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\AdminController;

// -------- Guest Routes --------
Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/rentals', [CarController::class, 'index']);

// -------- Authenticated Customer Routes --------
Route::middleware(['auth'])->group(function () {
    Route::post('/rentals/book', [RentalController::class, 'store']);
    Route::get('/my-bookings', [RentalController::class, 'myBookings']);
    Route::post('/cancel-booking/{id}', [RentalController::class, 'cancel']);

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------- Admin Routes --------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', AdminRentalController::class);
    Route::resource('customers', AdminCustomerController::class);
});

// -------- Breeze Auth Routes --------
require __DIR__.'/auth.php';

