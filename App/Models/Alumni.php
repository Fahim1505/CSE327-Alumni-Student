<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // table name (must match your migration)
    protected $table = 'alumnis';

    // fields we want to allow insertion for (very important)
    protected $fillable = [
        'name',
        'email',
        'password',
        'reg_no',
        'department',
        'graduation_year',
    ];

    // to hide password when retrieving from DB
    protected $hidden = ['password'];
}
