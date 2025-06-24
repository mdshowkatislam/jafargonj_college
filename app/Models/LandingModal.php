<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class LandingModal extends Model
{ 	 

    protected $table = "landing_modals";    

    Protected $fillable = ['name','image','description','use_for', 'faculty_id', 'department_id', 'status', 'start_date', 'end_date', 'use_for_id'];
}
