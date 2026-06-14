<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('consultationSlot.course')->latest()->get();

        return view('teacher.dashboard', compact('bookings'));
    }
}