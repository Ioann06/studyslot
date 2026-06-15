<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationSlot extends Model
{
    protected $fillable = [
        'teacher_id',
        'course_id',
        'title',
        'date',
        'start_time',
        'end_time',
        'max_students',
        'status'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}