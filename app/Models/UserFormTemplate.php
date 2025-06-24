<?php

// app/Models/UserFormTemplate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFormTemplate extends Model
{
    use SoftDeletes;

    protected $fillable = ['form_id', 'form_data'];

    protected $casts = [
        'form_data' => 'array',
    ];

    // Define the relationship to FormTemplate
    public function formTemplate()
    {
        return $this->belongsTo(FormTemplate::class, 'form_id');
    }
}
