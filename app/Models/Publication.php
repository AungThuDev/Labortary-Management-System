<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = ["name","name_link","journal","journal_link","image"];
    public function authors()
    {
        return $this->hasMany(Author::class);
    }
}
