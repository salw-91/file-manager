<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => '2023-11-26 21:25:07',
            'password' => '$2y$10$MOTzIM4j0scXbx2elrj4x.0jbeyu6kHXSOe96/ZwnyWWsVlE0owcy', //testtest
            'created_at' => '2023-11-26 21:24:50',
            'updated_at' => '2023-11-26 21:24:50'
        ]);
    }
}
