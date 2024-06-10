<?php

  namespace Database\Seeders;

  use App\Models\Amenity;
  use App\Models\Reservation;
  use App\Models\User;
  use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

  class DatabaseSeeder extends Seeder
  {
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      // User::factory(10)->create();

      User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@mc.com',
      ]);

      User::factory(99)->create();

      Amenity::factory(100)->create();

      Reservation::factory(100)->create();

    }
  }
