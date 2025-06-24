<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniModerator extends Model
{
    use HasFactory;

    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function designation()
    {
        return $this->belongsTo(AlumniDesignation::class, 'Alumni_designation_id', 'id');
    }
}
