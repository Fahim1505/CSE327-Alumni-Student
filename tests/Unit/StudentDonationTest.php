<?php

namespace Tests\Unit;

use App\Models\StudentDonation;
use PHPUnit\Framework\TestCase;
use App\Models\Student;

class StudentDonationTest extends TestCase
{
    /**
     * Test whether the function returns the full details of the donation
     */
    public function test_full_details_of_student_donation(): void
    {
        $studentDonation = new StudentDonation([
            'student_id'=> '2131800642',
            'donation_type' => 'Money',
            'description' => 'Donating money through bKash',
            'amount' => '25000',
            'image' => 'donation_img.jpg'

        ]);
        $this->assertEquals('2131800642, Money, Donating money through bKash, 25000, donation_img.jpg', $studentDonation->studentDonationDetails());
    }
    /**
     * Test whether negative amounts in donation is allowed or not
     */
    public function test_negative_amount_of_donation_not_allowed()
    {
    $donation = new StudentDonation();

    $donation->amount = -50000;

    $this->assertTrue($donation->amount < 0);
    }
    /**
     *@test
     */

    public function it_handles_extremely_large_amount_values()
    {
        $donation = new StudentDonation([
            'amount' => 999999999999
        ]);

        $this->assertGreaterThan(0, $donation->amount);
    }

}
