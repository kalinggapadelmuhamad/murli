<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Galery;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Murliana',
            'email' => 'Murliana@gmail.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make('12345678'),
            'role' => 'Owner'
        ]);

        User::factory()->create([
            'name' => 'Kalingga Padel Muhamad',
            'email' => 'enginerbros@gmail.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make('12345678'),
            'role' => 'Admin'
        ]);

        User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => Hash::make('12345678'),
            'role' => 'User'
        ]);

        AboutUs::create([
            'description' => fake()->text(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'instagram_link' => '',
            'maps_link' => '',
        ]);

        Project::create([
            'name' => 'CITRA GRAND SEMARANG',
            'theme' => 'MODERN CLASSIC',
            'category' => 'RESIDENTIAL',
            'description' => fake()->text()
        ]);

        Galery::create([
            'project_id' => 1,
            'image' => 'avatar-1.png'
        ]);

        Galery::create([
            'project_id' => 1,
            'image' => 'avatar-2.png'
        ]);

        Galery::create([
            'project_id' => 1,
            'image' => 'test.jpg'
        ]);
    }
}