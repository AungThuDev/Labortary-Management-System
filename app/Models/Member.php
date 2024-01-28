<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'status',
        'image',
        'about',
        'facebook',
        'instagram',
        'twitter'
    ];

    public function research()
    {
        return $this->hasMany(Research::class,'member_id');
    }
    public function memberedu()
    {
        return $this->hasMany(MemberEdu::class,'member_id');
    }
}
