<?php

namespace App\Models;
use App\Services\TypeService;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    Protected $fillable = ['name','sub_category','ref_id','sort','status','created_by','updated_by', 'deleted_by'];
}
