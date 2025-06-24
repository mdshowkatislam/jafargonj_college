<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignToClub extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function member()
    {
        return $this->belongsTo(ClubMember::class, 'club_member_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(ClubDesignation::class, 'club_designation_id', 'id');
    }
}
