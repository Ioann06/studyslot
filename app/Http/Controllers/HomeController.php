<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ConsultationSlot;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        $slots = ConsultationSlot::with('course')->latest()->get();

        return view('home', compact('courses', 'slots'));
    }
}