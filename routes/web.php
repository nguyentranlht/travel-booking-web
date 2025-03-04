<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/payments')->group(function() {
        Route::get('/checkout/{tourId}', [PaymentController::class, 'checkout'])->name('checkout');
        Route::get('/success', [PaymentController::class, 'success'])->name('payments.success');
        Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');
    });
    
    Route::resource('/tours', TourController::class);
});


require __DIR__.'/auth.php';
