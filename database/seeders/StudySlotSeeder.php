<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\ConsultationSlot;

class StudySlotSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::create([
            'title' => 'Web Programming',
            'description' => 'Laravel project consultations',
            'teacher_name' => 'Mr. Teacher',
        ]);

        ConsultationSlot::create([
            'course_id' => $course->id,
            'title' => 'Laravel consultation',
            'date' => '2026-06-20',
            'start_time' => '10:00',
            'end_time' => '10:30',
            'max_students' => 1,
            'status' => 'available',
        ]);

        ConsultationSlot::create([
            'course_id' => $course->id,
            'title' => 'Database consultation',
            'date' => '2026-06-21',
            'start_time' => '12:00',
            'end_time' => '12:30',
            'max_students' => 2,
            'status' => 'available',
        ]);
    }
}