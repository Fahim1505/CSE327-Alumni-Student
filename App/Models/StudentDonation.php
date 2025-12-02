<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDonation extends Model
{
    use HasFactory;

    protected $table = 'donation';

    protected $fillable = [
        'student_id',
        'donation_id',
        'donation_type',
        'description',
        'image',
        'amount',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function studentDonationDetails() : string
    {
        return $this->student_id.', '.$this->donation_type.', '.$this->description.', '.$this->amount.', '.$this->image;
    }
}
