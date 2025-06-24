<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallMember extends Model
{
    use HasFactory;

    Protected $fillable = ['hall_id', 'type_id', 'member_id', 'status', 'sort_order', 'additional_designation', 'additional_charge', 'designations'];

    public function member()
    {
        return $this->belongsTo(Profile::class,'member_id','id');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class,'hall_id','id');
    }
}
