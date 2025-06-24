<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Club extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'establish_date' => 'datetime:d-m-Y H:00',
    ];

    public function generateSlug($name, $currentSlug = null)
    {
        // Convert the title to a slug-friendly format
        $slug =  Str::slug($name);


        // Check if the slug is unique and different from the current slug
        $count = static::where('slug', $slug)->where('slug', '!=', $currentSlug)->count();
        if ($count > 0) {
            // If not unique, add a numeric suffix to the slug
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function events()
    {
        return $this->hasMany(News::class,'club_id','id');
    }

}
