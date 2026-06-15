<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('course')->latest()->get();

        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('materials.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_link' => 'nullable|string'
        ]);

        Material::create($request->all());

        return redirect('/materials')
            ->with('success', 'Material created successfully.');
    }
}