<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApaCategory extends Model
{
    use HasFactory;
    protected $table = "apa_categories";

    public function apa_report()
    {
        return $this->hasMany(ApaReport::class);
    }
}
