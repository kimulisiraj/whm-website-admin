<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocationActivity>
 */
class LocationActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'location_id'   => \App\Models\Location::factory(),
            'banner_image' => $this->faker->imageUrl,
            'title'        => $this->faker->text(7),
            'description'  => $this->faker->text(100),
            'happened_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
