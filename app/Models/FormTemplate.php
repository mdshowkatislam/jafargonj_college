<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'start_date', 'end_date', 'form_data'];

}
