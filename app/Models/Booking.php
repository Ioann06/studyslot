<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'consultation_slot_id',
        'student_name',
        'student_email',
        'message',
        'status'
    ];

    public function consultationSlot()
    {
        return $this->belongsTo(ConsultationSlot::class);
    }
}