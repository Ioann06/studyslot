<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'teacher_name'];

    public function consultationSlots()
    {
        return $this->hasMany(ConsultationSlot::class);
    }
}