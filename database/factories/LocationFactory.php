<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'banner_image' => $this->faker->imageUrl(1024, 420),
            'pastors_image'  => $this->faker->imageUrl,
            'pastors_name'  => $this->faker->name,
            'pastors_level'  => $this->faker->randomElement(['Network Leader', 'Cluster Leader', 'Location Pastor']),
            'location_name' => $this->faker->state,
            'address'       => $this->faker->address,
            'description'   => $this->faker->text(1000),
        ];
    }
}
