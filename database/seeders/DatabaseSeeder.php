<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Review;
use App\Models\Studio;
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

        Studio::factory()->create([
            'name' => 'Blizzard',
         ]);
        Studio::factory()->create([
            'name' => 'Rockstar Games',
        ]);

        // Execute the run() from the AdminSeeder
        $this->call(AdminSeeder::class);
    }
}
