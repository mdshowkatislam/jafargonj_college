<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsButexTheme extends Model
{
    use HasFactory;

    protected $fillable = ['theme_name', 'theme_image'];

    public function details()
    {
        return $this->belongsTo(CmsTheme::class, 'theme_id ');
    }
}
