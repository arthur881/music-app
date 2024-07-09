<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => 'trk-' . Str::uuid(),
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name(),
            'image' => 'tracks/images/test.svg',
            'music' => 'tracks/musics/test.wav',
            'display' => $this->faker->boolean(90),
            'play_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}