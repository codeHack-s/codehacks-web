<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $course_titles = [
            'Web Development',
            'Software Development (Java, C++, C)',
            'Graphic Design (Adobe Photoshop)',
            'Video Editing',
            'Freelance and Entrepreneurship',
            'Web Deployment',
            'Marketing'
        ];

        $course_descriptions = [
            "Introduction to Web Development: HTML, CSS, JavaScript Basics. Advanced Web Development: JavaScript Advanced Topics, Introduction to jQuery, AJAX. Frontend Frameworks: Svelte, React, Vue.js. Backend Development: Node.js, PHP, Laravel. Full-Stack Web Development: MEAN/MERN Stack, LAMP Stack. Web Deployment and Hosting: Using hosting platforms, Introduction to cloud services (AWS, Google Cloud), Domain linking, SSL encryption.",
            "Introduction to Programming: Basic syntax, data types, control structures, arrays, functions. Intermediate Programming: Object-oriented programming, Exception handling, File I/O. Advanced Programming: Data structures, Algorithms, Multi-threading. Software Development Life Cycle: Planning, Design, Implementation, Testing, Deployment, Maintenance. Project-based Learning: Building a simple software application from scratch.",
            "Introduction to Graphic Design: Basics of Adobe Photoshop, Understanding design principles. Logo Design: Conceptualizing, Designing, Refining a logo. Poster Design: Typography, Use of color, composition, Creating engaging posters. Photo Editing: Image manipulation techniques, Color correction, Retouching. UX/UI Design: Wireframing, Prototyping, User testing, Implementing a design in a website.",
            "Introduction to Video Editing: Basics of editing, Cuts and transitions, Working with audio. Advanced Video Editing: Special effects, Color grading, Text animations. Storytelling with Video: Storyboarding, Pacing, Narration.",
            "Building your Brand: Creating a portfolio, Personal branding. Finding Clients: How to pitch, Networking, Using freelance platforms. Managing Projects: Client communication, Project management tools, Time management. Pricing Your Work: How to charge, Handling payments, Contracts.",
            "Linux OS, Servers",
            ""
        ];

        for ($i = 0; $i < count($course_titles); $i++) {
            Course::create([
                'user_id' => 1,
                'title' => $course_titles[$i],
                'description' => $course_descriptions[$i],
                'online' => rand(0, 1),
                'created_by' => 1,
                'updated_by' => 1,
                'image_url' => '/images/bg' . ($i % 5 + 1) . '.jpg'
            ]);
        }
    }
}
