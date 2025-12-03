<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\PhotoGallery;
use PHPUnit\Framework\Attributes\Test;

class PhotoGalleryModelTest extends TestCase
{

    public function test_expected_fillable_attributes()
    {
        $model = new PhotoGallery;

        $this->assertEquals([
            'name',
            'filePath',
            'caption',
            'graduationYear',
            'uploadedAt',
        ], $model->getFillable());
    }

    #[Test]
    public function test_create_model_instance_in_memory()
    {
        $model = new PhotoGallery;

        $this->assertInstanceOf(PhotoGallery::class, $model);
    }

    #[Test]
    public function test_mass_assignment_in_memory()
    {
        $data = [
            'name' => 'Ananna Saha',
            'filePath' => 'gallery/sample.jpg',
            'caption' => 'My first day at Uni.',
            'graduationYear' => 2024,
            'uploadedAt' => now(),
        ];


        $model = new PhotoGallery($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $model->{$key});
        }
    }
}
