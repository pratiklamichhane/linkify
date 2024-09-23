<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Link;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    protected $faker;

    /**
     * Seed the application's database.
     */
    public function __construct()
    {
        // Initialize the Faker instance
        $this->faker = Faker::create();
    }

    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'username' => 'admin',
        //     'password' => bcrypt('password'),
        //     'phone' => '1234567890',
        //     'role' => 'admin',
        // ]);

        // Create 100 links where user_id = 15, category_id = 19, with random title, url, and duration
        // Link::factory(100)->create([
        //     'user_id' => 15,
        //     'category_id' => 19,
        //     'title' => $this->faker->sentence(3),
        //     'url' => $this->faker->url,
        //     'duration' => $this->faker->numberBetween(1, 1000),
        // ]);
    }
}
