<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\StudentDonation;

class Student extends Authenticatable
{
  //
  use HasFactory, Notifiable;
  protected $table = "student";

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
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
  protected $hidden = [
    'password',
    'remember_token',
  ];
  /**
   * This is a function for the donations for registered students
   */
  public function donations()
    {
        return $this->hasMany(StudentDonation::class);
    }
  /**
   * This is a helper function for testing the full readable profile string for a registered student
   */

  public function studentDetails() : string
    {
        return $this->name.', '.$this->admission_year.', '.$this->current_semester.', '.$this->division.', '.$this->student_id ;
    }
  /**
   * This is a helper function for testing unusual student id's
   */

  public function unusualStudentId() : string
    {
        return $this->student_id ;
    }

}

