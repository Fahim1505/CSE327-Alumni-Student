<?php

namespace Tests\Unit;

use App\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    /**
     * Test whether the function returns the full name of the student
     */
    public function test_full_name_of_student(): void
    {
        $student = new Student([
            'First_name'=> 'Ahnaf',
            'Middle_name' => 'Nafim',
            'Surname' => 'Shiraj'
        ]);
        $this->assertEquals('Ahnaf Nafim Shiraj', $student->fullName());
    }
}
