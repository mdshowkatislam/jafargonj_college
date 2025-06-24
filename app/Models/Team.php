<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Profile::class, 'team_member', 'id');
    }
    public function committee_designation()
    {
        return $this->belongsTo(Designation::class, 'designation', 'id');
    }
}
