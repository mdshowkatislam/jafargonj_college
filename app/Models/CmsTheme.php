<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsTheme extends Model
{
    use HasFactory;

    protected $fillable = ['theme_id', 'theme_section_id', 'page_id', 'section_title', 'number_of_column', 'section_order', 'status', 'col_id', 'col1_name', 'col2_id', 'col2_name', 'col3_id', 'col3_name', 'col4_id', 'col4_name', 'col5_id', 'col5_name', 'col6_id', 'col6_name', 'custom_style', 'custom_css', 'cssPreview', 'custom_class', 'custom_script'];

    public function components()
    {
        return $this->hasMany(CmsComponent::class, 'theme_section_id');
    }

    public function lastComponent()
    {
        return $this->hasOne(CmsComponent::class, 'theme_section_id')->latest();
    }

    public function theme()
    {
        return $this->belongsTo(CmsButexTheme::class, 'theme_id');
    }


}
