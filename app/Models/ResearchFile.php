<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchFile extends Model
{
    use HasFactory;

    Protected $fillable = ['research_id', 'file_title', 'file'];

    public function research()
    {
        return $this->belongsTo(Research::class,'research_id', 'id');
    }
}
