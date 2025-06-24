<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceMember extends Model
{
    use HasFactory;

    protected $table = 'conference_members';

    protected $fillable = [
        'member_type',
        'member_name',
        'designation_1',
        'designation_2',
        'designation_3',
        'phone',
        'email',
        'description',
        'image',
        'status'
    ];
}
