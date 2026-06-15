<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'file_link'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}