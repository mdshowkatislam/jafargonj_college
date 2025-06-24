<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDepartment extends Model
{
    use HasFactory;
    protected $table = 'job_departments';
    protected $fillable = ['title', 'status'];
}
