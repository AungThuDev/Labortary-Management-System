<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'name',
        'image',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
