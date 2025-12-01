<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // use users table from your migration
    protected $table = 'users';

    protected $fillable = [
        'name',
        'batch',
        'department',
        'workplace',
        'email',
        'phone',
        'profile_photo',
        'linkedin',
        'twitter',
        'github',
        'website',
    ];
}
