<?php

  namespace Database\Factories;

  use Illuminate\Database\Eloquent\Factories\Factory;

  /**
   * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
   */
  class AmenityFactory extends Factory
  {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'name' => $this->faker->word,
        'description' => $this->faker->sentence,
        'slug' => $this->faker->unique()->slug,
        'is_available' => $this->faker->boolean,
      ];
    }
  }
