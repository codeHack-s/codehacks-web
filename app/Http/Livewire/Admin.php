<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Admin extends Component
{
    public Collection $courses;
    public Collection $lessons;
    public Collection $resources;
    public Course $editingCourse;
    public string $title = '';
    public string $slug = '';
    public string $description = '';

    public bool $showModal = false;

    public function mount(): void
    {
        $this->courses = Course::all();
        $this->lessons = Lesson::all();
        $this->resources = Resource::all();
    }

    public function editCourse($courseId): void
    {
        $this->editingCourse = Course::find($courseId);
        $this->title = $this->editingCourse->title;
        $this->slug = $this->editingCourse->slug;
        $this->description = $this->editingCourse->description;
        $this->showModal = true;
    }

    public function deleteCourse($courseId): void
    {
        $course = Course::find($courseId);
        $course->delete();
        $this->courses = Course::all();
    }

    public function createNewCourse(): void
    {
        $this->resetInputFields();
        $this->showModal = true;
    }


    public function saveCourse(): void
    {
        if (isset($this->editingCourse->id)) {
            // Update existing course
            $this->editingCourse->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);
        } else {
            // Create new course
            Course::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
            ]);
        }

        $this->showModal = false;
        $this->courses = Course::all();
        $this->resetInputFields();
    }

    private function resetInputFields(): void
    {
        $this->editingCourse = new Course();
        $this->title = '';
        $this->slug = '';
        $this->description = '';
    }

    public function render(): View
    {
        return view('admin.index');
    }
}
