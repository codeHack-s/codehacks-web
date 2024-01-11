<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseRegistration as ModelsCourseRegistration;
use Doctrine\DBAL\Schema\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;

class CourseRegistration extends Component
{
    public Course $course;
    public bool $isRegistered = false;

    public function mount(Course $course): void
    {
        $this->course = $course;
        $this->isRegistered = ModelsCourseRegistration::where('user_id', auth()->user()->id)
            ->where('course_id', $this->course->id)
            ->exists();
    }

    public function register(): void
    {
        if ($this->isRegistered) {
            // User is already registered, so we deregister
            ModelsCourseRegistration::where('course_id', $this->course->id)
                ->where('user_id', auth()->user()->id)
                ->delete();

            sleep(1);

            $this->isRegistered = false;
        } else {
            // User is not registered, so we register
            ModelsCourseRegistration::create([
                'course_id' => $this->course->id,
                'user_id' => auth()->user()->id,
                'registration_date' => now(),
                'progress' => 0,
            ]);

            // Sleep for some seconds to simulate a slow connection
            sleep(1);

            $this->course = Course::find($this->course->id);
            $this->isRegistered = true;
        }
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('courses.card');
    }
}
