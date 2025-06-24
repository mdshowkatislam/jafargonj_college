<?php

namespace App\Models;

use App\Http\Controllers\Backend\Homepage\GalleryCategoryController;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    Protected $fillable = ['gallery_category_id','title','image','status','is_featured','created_by','updated_by','deleted_by'];


}

