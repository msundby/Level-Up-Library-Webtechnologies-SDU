<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomDigit(),
            'game_id' => $this->faker->randomDigit(),
            'description' => $this->faker->paragraph,
            'rating' => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}
