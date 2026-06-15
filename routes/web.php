<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultationSlotController;
use App\Http\Controllers\TeacherDashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/consultations', [ConsultationSlotController::class, 'index']);

Route::get('/book/{slotId}', [BookingController::class, 'create']);

Route::post('/book', [BookingController::class, 'store'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'teacher'])->group(function () {

    Route::get('/teacher', [TeacherDashboardController::class, 'index']);

    Route::get('/teacher/create', [TeacherDashboardController::class, 'create']);

    Route::post('/teacher/store', [TeacherDashboardController::class, 'store']);

    Route::get('/teacher/edit/{id}', [TeacherDashboardController::class, 'edit']);

    Route::post('/teacher/update/{id}', [TeacherDashboardController::class, 'update']);

    Route::post('/teacher/delete/{id}', [TeacherDashboardController::class, 'destroy']);

    Route::get('/teacher/bookings', [TeacherDashboardController::class, 'bookings']);

    Route::post(
        '/teacher/bookings/{id}/approve',
        [TeacherDashboardController::class, 'approveBooking']
    );

    Route::post(
        '/teacher/bookings/{id}/reject',
        [TeacherDashboardController::class, 'rejectBooking']
    );
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'teacher') {
        return redirect('/teacher');
    }

    return redirect('/consultations');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';