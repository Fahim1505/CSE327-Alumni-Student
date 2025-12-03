<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = [
        'name',
        'filePath',
        'caption',
        'graduationYear',
        'uploadedAt',
    ];
}
