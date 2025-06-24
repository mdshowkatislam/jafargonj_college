<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubModerator extends Model
{
    use HasFactory;

    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function designation()
    {
        return $this->belongsTo(ClubDesignation::class, 'club_designation_id', 'id');
    }
}
