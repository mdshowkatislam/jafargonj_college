<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = ['title','type_id', 'ref_id', 'author', 'co_author', 'abstract', 'attachment', 'date'];
    
}
