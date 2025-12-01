<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'job_title',
        'company_name',
        'job_type',
        'description',
        'dateline',
    ];
}
