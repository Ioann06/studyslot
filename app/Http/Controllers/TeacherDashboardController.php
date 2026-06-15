<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationSlot;
use App\Models\Course;
use App\Models\Booking;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $slots = ConsultationSlot::where(
            'teacher_id',
            auth()->id()
        )->get();

        return view('teacher.index', compact('slots'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('teacher.create', compact('courses'));
    }

    public function store(Request $request)
    {
        ConsultationSlot::create([
            'teacher_id' => auth()->id(),
            'title' => $request->title,
            'course_id' => $request->course_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'max_students' => $request->max_students,
            'status' => 'available'
        ]);

        return redirect('/teacher');
    }

    public function bookings()
    {
        $bookings = Booking::with('consultationSlot')
            ->whereHas('consultationSlot', function ($query) {
                $query->where('teacher_id', auth()->id());
            })
            ->get();

        return view('teacher.bookings', compact('bookings'));
    }

    public function approveBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'approved'
        ]);

        return back();
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'rejected'
        ]);

        return back();
    }

    public function edit($id)
    {
        $slot = ConsultationSlot::findOrFail($id);

        return view('teacher.edit', compact('slot'));
    }

    public function update(Request $request, $id)
    {
        $slot = ConsultationSlot::findOrFail($id);

        $slot->update([
            'title' => $request->title,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'max_students' => $request->max_students,
        ]);

        return redirect('/teacher');
    }

    public function destroy($id)
    {
        ConsultationSlot::findOrFail($id)->delete();

        return redirect('/teacher');
    }
}