<?php

namespace Tests\Unit;

use App\Models\StudentAchievements;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class StudentAchievementsModelTest extends TestCase
{

    public function test_correct_table_name(): void
    {
        $model = new StudentAchievements();
        $this->assertEquals('achievements', $model->getTable());
    }


    public function test_expected_fillable_attributes(): void
    {
        $model = new StudentAchievements();

        $this->assertEquals([
            'student_id',
            'first_name',
            'last_name',
            'department',
            'title',
            'description',
            'imagePath',
        ], $model->getFillable());
    }


    public function test_timestamp_columns(): void
    {
        $this->assertEquals('createdAt', StudentAchievements::CREATED_AT);
        $this->assertNull(StudentAchievements::UPDATED_AT);
    }


    public function test_create_a_model_instance_in_memory(): void
    {
        $achievement = new StudentAchievements([
            'student_id' => 1001,
            'first_name' => 'Ananna',
            'last_name' => 'Saha',
            'department' => 'CSE',
            'title' => 'Best Project Award',
            'description' => 'Awarded for outstanding project.',
            'imagePath' => 'achievements/sample2.jpg',
        ]);

        $this->assertInstanceOf(StudentAchievements::class, $achievement);
        $this->assertEquals('Ananna', $achievement->first_name);
    }

    #[Test]
    public function test_mass_assignment_in_memory(): void
    {
        $data = [
            'student_id' => 1002,
            'first_name' => 'Oyeshee',
            'last_name' => 'Jahan',
            'department' => 'EEE',
            'title' => 'Dean’s Award',
            'description' => 'Top 5% of the batch.',
            'imagePath' => 'achievements/sample3.jpg',
        ];

        // to avoid database / container errors
        $achievement = new StudentAchievements($data);

        $this->assertEquals($data['first_name'], $achievement->first_name);
        $this->assertEquals($data['last_name'], $achievement->last_name);
        $this->assertEquals($data['title'], $achievement->title);
    }
}
