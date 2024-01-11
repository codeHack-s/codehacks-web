<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    protected $model = Lesson::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        $courses = Course::all();

        return [
            'title' => $title,
            'content' => $this->faker->paragraph,
            'slug' => Str::slug($title),
            'course_id' => $courses->random()->id,
            'scheduled_time' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
