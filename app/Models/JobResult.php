<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'attachment',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
