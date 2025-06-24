<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title', 'date', 'deadline', 'payscale', 'job_type', 'job_categorie_id', 
        'mode_status', 'type', 'status', 'attachment', 'attachment2',
        'additional_requirements','job_details','experience','hall_id','club_id','office_id',
        'department_id','faculty_id','responsibilities_context'];

    // public function jobCategories()
    // {
    //     return $this->belongsTo(JobCategory::class, 'job_categorie_id', 'id');
    // }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_categorie_id');
    }

    public function jobOffice()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function jobDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function jobHall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    public function jobClub()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function jobResults()
    {
        return $this->hasMany(JobResult::class);
    }
    
}
