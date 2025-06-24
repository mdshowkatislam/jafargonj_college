<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsComponent extends Model
{
    use HasFactory;

    protected $fillable = ['section_id ', 'column_id', 'component_id', 'component_type'];

    public function section()
    {
        return $this->belongsTo(CmsSection::class, 'section_id ');
    }
}
