<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'formal_code',
        'title',
        'credit',
        'semester_no',
        'short_description',
    ];

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
