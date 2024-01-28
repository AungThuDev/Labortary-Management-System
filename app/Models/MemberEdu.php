<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEdu extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'description',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
