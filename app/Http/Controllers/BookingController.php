<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ConsultationSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($slotId)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'student') {
            return redirect('/');
        }

        $slot = ConsultationSlot::with('course')->findOrFail($slotId);

        return view('bookings.create', compact('slot'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'student') {
            return redirect('/');
        }

        $request->validate([
            'consultation_slot_id' => 'required|exists:consultation_slots,id',
            'message' => 'nullable|string',
        ]);

        Booking::create([
            'consultation_slot_id' => $request->consultation_slot_id,
            'student_name' => auth()->user()->name,
            'student_email' => auth()->user()->email,
            'message' => $request->message,
        ]);

        return redirect('/consultations')
            ->with('success', 'Booking created successfully!');
    }
}