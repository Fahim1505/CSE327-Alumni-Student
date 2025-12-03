<?php

namespace Tests\Unit;

use App\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    /**
     * Test whether the function returns the full name of the student
     */
    public function test_full_details_of_registered_student(): void
    {
        $student = new Student([
            'name'=> 'Ahnaf Nafim Shiraj',
            'admission_year' => '2021',
            'current_semester' => '11th',
            'division' => 'Dhaka',
            'student_id' => '2131800642'

        ]);
        $this->assertEquals('Ahnaf Nafim Shiraj, 2021, 11th, Dhaka, 2131800642', $student->studentDetails());
    }
}
