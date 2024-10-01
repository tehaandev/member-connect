<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Reservation;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, create the roles
        Roles::create([
            'name' => 'admin',
            'slug' => 'admin',
            'id' => 1,
        ]);

        Roles::create([
            'name' => 'super-admin',
            'slug' => 'super-admin',
            'id' => 0,
        ]);

        Roles::create([
            'name' => 'user',
            'slug' => 'user',
            'id' => 2,
        ]);

        // Now create the users with the correct role_ids
        User::factory()->create([
            'name' => 'Sample Admin',
            'email' => 'admin@mc.com',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Sample Member',
            'email' => 'member@mc.com',
            'role_id' => 2,
        ]);

        // Create remaining users
        User::factory(98)->create();

        // Create amenities and reservations
        Amenity::factory(100)->create();
        Reservation::factory(100)->create();
    }
}
