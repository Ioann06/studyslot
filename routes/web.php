<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultationSlotController;
use App\Http\Controllers\BookingController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/consultations', [ConsultationSlotController::class, 'index']);

Route::get('/book/{slotId}', [BookingController::class, 'create']);
Route::post('/book', [BookingController::class, 'store']);