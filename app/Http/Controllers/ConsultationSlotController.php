<?php

namespace App\Http\Controllers;

use App\Models\ConsultationSlot;

class ConsultationSlotController extends Controller
{
    public function index()
    {
        $slots = ConsultationSlot::with('course')->get();

        return view('consultations.index', compact('slots'));
    }
}