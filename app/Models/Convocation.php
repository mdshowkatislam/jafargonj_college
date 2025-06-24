<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'convocations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
        'data6',
        'data7',
        'data8',
        'data9',
        'data10',
        'status',
        'registration_status',
        'registration_link',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'registration_status' => 'string',
    ];
}
