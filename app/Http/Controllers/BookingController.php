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

        $slot = ConsultationSlot::findOrFail($request->consultation_slot_id);

        $alreadyBooked = Booking::where('user_id', auth()->id())
            ->where('consultation_slot_id', $slot->id)
            ->exists();

        if ($alreadyBooked) {
            return redirect('/consultations')
                ->with('error', 'You have already booked this consultation.');
        }

        $currentBookings = Booking::where(
            'consultation_slot_id',
            $slot->id
        )->count();

        if ($currentBookings >= $slot->max_students) {
            return redirect('/consultations')
                ->with('error', 'No available places left.');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'consultation_slot_id' => $slot->id,
            'student_name' => auth()->user()->name,
            'student_email' => auth()->user()->email,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect('/consultations')
            ->with('success', 'Booking created successfully!');
    }
}