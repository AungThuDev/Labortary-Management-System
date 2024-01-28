<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','position','email','phone','image','about'
    ];

    public function Qualifications()
    {
        return $this->hasMany(Qualification::class,'principle_id');
    }
    public function Experimentations()
    {
        return $this->hasMany(Experimentation::class,'principle_id');
    }
    public function Awards()
    {
        return $this->hasMany(Award::class,'principle_id');
    }
    public function Associations()
    {
        return $this->hasMany(Association::class,'principle_id');
    }
    public function Services()
    {
        return $this->hasMany(Service::class,'principle_id');
    }
    public function Talks()
    {
        return $this->hasMany(Talk::class,'principle_id');
    }
}
