<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChurchEvent>
 */
class ChurchEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'description' => $this->faker->paragraph,
            'banner_image' => $this->faker->imageUrl,
            'link' => $this->faker->url,
            'link_text' => $this->faker->randomElement(['Register', 'Sign Up', 'Join']),
            'starts_at' => $this->faker->dateTimeBetween('-1 day', 'tomorrow'),
            'ends_at' => $this->faker->dateTimeBetween('tomorrow', '1 day'),
        ];
    }
}
