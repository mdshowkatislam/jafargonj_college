<?php

namespace App\Models;

use App\Services\NocService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeOrder extends Model
{
    use HasFactory;
    
    protected $table = "office_orders";
    Protected $fillable = ['category_type', 'noc_type', 'category_id','member_id', 'title', 'publish_date', 'status', 'attachment'];

    public function Profile()
    {
        return $this->belongsTo(Profile::class, 'member_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'category_id', 'id');
    }
    public function office()
    {
        return $this->belongsTo(Office::class, 'category_id', 'id');
    }
}
