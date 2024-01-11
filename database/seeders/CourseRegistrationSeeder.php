<?php

namespace Database\Seeders;

use App\Models\CourseRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseRegistration::factory()->count(40)->create();
    }
}
