<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AchievementFactory extends Factory
{
    protected $model = \App\Models\Achievement::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'category' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'date_achieved' => $this->faker->date(),
        ];
    }
}
