<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Studio>
 */
class StudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Studio::class;

    public function definition(): array
    {
        return [
            'name'=>fake()->name
        ];
    }
}
