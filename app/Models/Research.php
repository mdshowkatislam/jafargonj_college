<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = ['research_type', 'research_for', 'ref_id', 'title', 'director_id', 'director_bup', 'director_name', 'supervisor_id', 'supervisor_bup', 'supervisor_name', 'supervisor_url', 'attachment', 'co_author', 'description', 'journal_name', 'journal_index', 'journal_category', 'url', 'issn', 'volume', 'issue', 'publish_status', 'date', 'year', 'image'];

    public function director()
    {
        return $this->belongsTo(Profile::class, 'director_id', 'id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Profile::class, 'supervisor_id', 'id');
    }
    public function publication_status()
    {
        return $this->belongsTo(PublicationStatus::class, 'publish_status', 'id');
    }
}
