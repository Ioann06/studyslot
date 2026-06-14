<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationSlot;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $slots = ConsultationSlot::all();

        return view('teacher.index', compact('slots'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        ConsultationSlot::create([
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