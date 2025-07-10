<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->words(3, true),
            'tagline' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'image_name' => 'courseimage.png',
            'learnings' => ['Learning 1', 'Learning 2', 'Learning 3'],
        ];
    }

    public function released(?Carbon $releasedAt = null): self
    {
        return $this->state(
            fn (array $attributes) => ['released_at' => $releasedAt ?? now()]
        );
    }
}
