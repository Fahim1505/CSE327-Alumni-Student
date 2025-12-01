<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  //
  use HasFactory;
  protected $table = "student";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    "name",
    "admission_year",
    "current_semester",
    "division",
    "student_id",
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ["Password"];
  public function alumni()
  {
    return $this->belongsTo("App\Student");
  }
}

