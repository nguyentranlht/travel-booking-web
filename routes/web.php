<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
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

    Route::post('/like/{tourId}', [LikeController::class, 'toggleLike'])->name('like.toggle');

    Route::prefix('user')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('user.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('user.profile.destroy');

        Route::get('/bookings', [BookingController::class, 'index'])->name('user.bookings.index');
        Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('user.bookings.show');

        Route::get('/liked-tours', [LikeController::class, 'likedTours'])->name('user.liked.tours');

        Route::prefix('/payments')->group(function () {
            Route::get('/checkout/{tourId}', [PaymentController::class, 'checkout'])->name('checkout');
            Route::get('/success', [PaymentController::class, 'success'])->name('payments.success');
            Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');
        });
    });
});

Route::get('/home', [HomeController::class, 'home'])->name('tours.home');
Route::get('/tours',[TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{id}', [TourController::class, 'show'])->name('tours.show');

require __DIR__ . '/auth.php';
