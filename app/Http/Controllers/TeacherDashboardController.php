<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationSlot;
use App\Models\Course;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $slots = ConsultationSlot::all();

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
            'status' => 'available'
        ]);

        return redirect('/teacher');
    }
}