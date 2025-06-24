<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelsToOffice extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id','office_id','status', 'sort_order', 'additional_charge', 'additional_designation', 'designations'];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id','id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'additional_designation', 'id');
    }
}
