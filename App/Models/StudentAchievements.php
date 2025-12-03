<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAchievements extends Model
{

    protected $table = 'achievements';

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'department',
        'title',
        'description',
        'imagePath',
    ];

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = null;
}

