<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CourseRegistration>
 */
class CourseRegistrationFactory extends Factory
{
    protected $model = CourseRegistration::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::all();
        return [
            'user_id' => User::factory(),
            'course_id' => $courses->random()->id,
            'registration_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'progress' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
