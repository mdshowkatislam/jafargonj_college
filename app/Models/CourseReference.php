<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'version_id',
        'details',
        'url',
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
