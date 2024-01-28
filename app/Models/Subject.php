<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'room',
        'instructor_name',
        'instructor_email',
        'start_date',
        'end_date',
        'time',
        'web_page',
        'instructor_office',
        'office_hour',
        'image'
    ];
}
