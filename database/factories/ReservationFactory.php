<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'amenity_id' => $this->faker->numberBetween(1, 50),
          'slug' => $this->faker->unique()->slug,
            'date' => $this->faker->dateTimeBetween('now','+1 year')->format('Y-m-d'),
        ];
    }
}
