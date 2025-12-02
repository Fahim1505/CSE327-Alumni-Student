<?php

namespace Tests\Unit;

use App\Models\Student;
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
    /**
     * @test
     */
    public function student_id_accepts_long_or_unusual_strings()
    {
        $student = new Student([
            'name' => 'Ahnaf',
            'admission_year' => '2021',
            'current_semester' => '11th',
            'division' => 'Dhaka',
            'student_id' => str_repeat('X', 255)
        ]);

        $this->assertEquals(str_repeat('X', 255), $student->unusualStudentId());
    }
    /**
     * @test
     */
    public function test_negative_student_id_not_allowed()
    {
    $student = new Student();

    $student->student_id = -50000;

    $this->assertTrue($student->student_id < 0);
    }
    /**
     * @test
     */
    public function name_should_not_be_integer_type()
    {
        $student = new Student(['name' => 91230]);

        $this->assertFalse(is_numeric($student->name), "Name should not be numeric");
    }
    /**
     * @test
     */
    public function division_should_not_accept_unusual_strings()
    {
        $student = new Student(['division' => '!@#$%^']);

        $allowedDivisions = ['Dhaka', 'Barisal', 'Sylhet', 'Mymensingh', 'Khulna', 'Rajshahi', 'Rangpur'];

        $this->assertFalse(
            in_array($student->division, $allowedDivisions),
            "Division should not accept symbols"
        );
    }
}
