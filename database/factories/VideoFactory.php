<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'video_name' => $this->faker->name,
 
        ];
    }
}
