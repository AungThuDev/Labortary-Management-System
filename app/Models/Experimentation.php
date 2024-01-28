<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experimentation extends Model
{
    use HasFactory;
    protected $fillable = ['principle_id','description'];
    public function principle()
    {
        return $this->belongsTo(Principle::class);
    }
}
