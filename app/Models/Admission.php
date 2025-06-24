<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    Protected $fillable = ['faculty_id','department_id','program_category_id','type_id', 'title', 'start_date', 'end_date', 'session', 'file','status'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function programCategory()
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id', 'id');
    }
}
