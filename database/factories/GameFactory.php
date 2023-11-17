<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Game::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'description' => fake()->paragraph,
            'image-link'=> 'https://images.contentstack.io/v3/assets/bltb6530b271fddd0b1/blt232a8ff06bf93ebd/63eeb1546495981254659630/Valorant_2022_EP6-1_PlayVALORANT_ContentStackThumbnail_1200x625_MB01.png',
            'aggregate_rating' => fake()->randomFloat(2, 1, 10),
            'release_date' => fake()->date
        ];
    }
}
