<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';

    protected $fillable = [
        'subject_code',
        'name',
        'description',
        'instructor',
        'schedule',
        'grades',
        'prelims',
        'midterms',
        'prefinals',
        'finals',
        'date_taken'
    ];
}
