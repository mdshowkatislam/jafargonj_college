<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenCharter extends Model
{
    use HasFactory;
    protected $table = "citizen_charters";
    protected $fillable = ['title', 'file_path'];
}
