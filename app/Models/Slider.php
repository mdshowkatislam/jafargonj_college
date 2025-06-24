<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    Protected $fillable = ['text_on_banner','show_description','image','slider_master_id','sort_order'];
    public function slider_master()
    {
        return $this->belongsTo(SliderMaster::class);
    }

   



}
