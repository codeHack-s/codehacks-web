<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    protected $model = Resource::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson_id' => Lesson::factory(),
            'name' => $this->faker->word,
            'url' => $this->faker->url,
            'type' => $this->faker->randomElement(['video', 'audio', 'text']),
            'description' => $this->faker->sentence,
        ];
    }
}
