<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['name','ucam_office_id','about','designation_name','contact_info','profile_id','slider_id','banner_id','location','contact','email', 'sort_order','status'];

    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
