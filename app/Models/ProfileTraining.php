<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTraining extends Model
{
    use HasFactory;
    Protected $fillable = ['profile_id','TotalTraining','training'];
}
