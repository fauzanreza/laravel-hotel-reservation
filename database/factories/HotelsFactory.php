<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotels>
 */
class HotelsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->lexify('Hotel ?????'),
            'description' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'province' => $this->faker->word,
            'country' => $this->faker->country(),
            'rating'=> $this->faker->randomFloat(2, 3, 5),
            'image_url' => $this->faker->image(null, 640, 480)
        ];
    }
}
