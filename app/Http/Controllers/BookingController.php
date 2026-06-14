<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ConsultationSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($slotId)
    {
        $slot = ConsultationSlot::with('course')->findOrFail($slotId);

        return view('bookings.create', compact('slot'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consultation_slot_id' => 'required|exists:consultation_slots,id',
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|email',
            'message' => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect('/consultations')->with('success', 'Booking created successfully!');
    }
}