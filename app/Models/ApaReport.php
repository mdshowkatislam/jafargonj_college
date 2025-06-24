<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApaReport extends Model
{
    use HasFactory;
    protected $table = "apa_reports";
    protected $fillable = ['apa_category_id', 'title', 'url', 'status', 'publish_date'];
    public function getCategory()
    {
        return $this->belongsTo(ApaCategory::class, 'apa_category_id');
    }
}
