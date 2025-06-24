<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public function user_created(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function user_updated(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
    public function user_deleted(){
        return $this->belongsTo(User::class, 'deleted_by','id');
    }
}
