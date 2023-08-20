<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Course;
use Faker\Factory as Faker;

class LessonTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get a list of course IDs to associate with lessons
        $courseIds = Course::pluck('id')->toArray();

        // Seed lessons
        foreach (range(1, 20) as $index) {
            Lesson::create([
                'course_id' => $faker->randomElement($courseIds),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'venue' => $faker->optional()->address,
                'date' => $faker->dateTimeBetween('+1 day', '+1 month'),
                'registered_members_count' => $faker->numberBetween(0, 50),
                'attending_members_count' => $faker->numberBetween(0, 50),
            ]);
        }
    }
}
