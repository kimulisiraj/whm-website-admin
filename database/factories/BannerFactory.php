<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{

    public function definition(): array
    {
        return [
            'banner_image' => $this->faker->imageUrl(1024, 720),
            'title'        => $this->faker->text(10),
            'phase'        => $this->faker->text(30),
            'description'  => $this->faker->text(100),
            'link'         => $this->faker->url,
            'link_text'    => $this->faker->randomElement(['Register Now', 'Join Now']),
        ];
    }
}
