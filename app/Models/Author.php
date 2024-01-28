<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['publication_id','author_name','author_link'];
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
