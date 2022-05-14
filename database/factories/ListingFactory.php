<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'Projectid' => $this->faker->unique()->numberBetween($min = 1000, $max = 90000),
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'price' => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 1, $max = 100),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'delivery_time' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year', $timezone = null),
            'description' => $this->faker->paragraph(5),
        ];
    }
}
