<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignToAlumni extends Model
{
    use HasFactory;

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    public function member()
    {
        return $this->belongsTo(AlumniMember::class, 'alumni_member_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(AlumniDesignation::class, 'alumni_designation_id', 'id');
    }
}
