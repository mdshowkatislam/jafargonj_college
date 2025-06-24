<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelsToFacultyOfficer extends Model
{
    use HasFactory;
    protected $fillable = ['profile_id','faculty_id','department_id','status', 'sort_order'];
    
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
