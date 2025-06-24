<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanStaffList extends Model
{
    use HasFactory;

    protected $table = "dean_staff_lists";

    // protected $fillable = ['name', 'image', 'dean_information_id', 'email',
    // 'designation', 'rank', 'facebook', 'twitter', 'linkedin', 'phone', 'appointment_type', 'website', 
    // 'details_education', 'experience', 'publications'];
    protected $fillable = [
        'profile_id', 'faculty_id', 'sort_order', 'additional_charge', 'additional_designation', 'status'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
}
