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
        Game::factory(15)->create();
        Platform::factory(10)->create();
        Review::factory(30)->create();

         Studio::factory()->create([
            'name' => 'Blizzard',
         ]);
        Studio::factory()->create([
            'name' => 'Rockstar Games',
        ]);
    }
}
