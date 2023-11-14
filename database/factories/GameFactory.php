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
            'aggregate_rating' => fake()->randomFloat(2, 1, 10),
            'release_date' => fake()->date
        ];
    }
}
