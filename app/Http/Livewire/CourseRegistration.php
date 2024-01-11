<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Doctrine\DBAL\Schema\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;

class CourseRegistration extends Component
{
    public Course $course;

    public function mount(Course $course): void
    {
        $this->course = $course;
    }

    public function register(): void
    {
        dd('register');
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('courses.card');
    }
}
