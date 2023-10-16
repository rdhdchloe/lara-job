<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'position' => $this->faker->jobTitle(),
            'salary' => '400K',
            'company' => $this->faker->company(),
            'description' => $this->faker->paragraph(5),
            'url' => $this->faker->url(),
            'location' => $this->faker->city(),
            'user_id' => 1
        ];
    }
}
