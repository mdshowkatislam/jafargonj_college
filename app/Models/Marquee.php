<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    use HasFactory;
    protected $table = 'marquees';
    protected $fillable = [
        'title',
        'url',
        'start_date',
        'end_date',
        'sort_order',
        'status'
    ];
}
