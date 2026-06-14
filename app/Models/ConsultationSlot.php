<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationSlot extends Model
{
    protected $fillable = [
        'course_id', 'title', 'date', 'start_time', 'end_time', 'max_students', 'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}