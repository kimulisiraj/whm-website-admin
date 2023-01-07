<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sermon>
 */
class SermonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'banner_image' => $this->faker->imageUrl,
            'title' => $this->faker->text(20),
            'description' => $this->faker->paragraph,
            'link' => $this->faker->url,
        ];
    }
}
