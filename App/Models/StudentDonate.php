<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
class StudentDonate extends Model
{
    //class Donation extends Model { 
    use HasFactory; 
    protected $table = 'donation'; 
    public $timestamps = true; 
    protected $fillable = [ 'donation_id', 'donation_type', 'description', 'image', ];}
}
