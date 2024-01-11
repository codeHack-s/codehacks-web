<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AdminLessons extends Component
{
    public Collection $lessons;
    public Collection $courses;
    public Lesson $editingLesson;
    public string $title = '';
    public string $slug = '';
    public string $content = '';
    public int $course_id;
    public string $scheduled_time;

    public bool $showModal = false;

    public function mount(): void
    {
        $this->lessons = Lesson::all();
        $this->courses = Course::all();
    }

    public function editLesson($lessonId): void
    {
        $this->editingLesson = Lesson::find($lessonId);
        $this->title = $this->editingLesson->title;
        $this->content = $this->editingLesson->content;
        $this->course_id = $this->editingLesson->course_id;
        $this->scheduled_time = $this->editingLesson->scheduled_time;
        $this->showModal = true;
    }

    public function deleteLesson($lessonId): void
    {
        $lesson = Lesson::find($lessonId);
        $lesson->delete();
        $this->lessons = Lesson::all();
    }

    public function createNewLesson(): void
    {
        $this->resetInputFields();
        $this->showModal = true;
    }

    public function saveLesson(): void
    {
        if (isset($this->editingLesson->id)) {
            // Update existing lesson
            $this->editingLesson->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'content' => $this->content,
                'course_id' => $this->course_id,
                'scheduled_time' => $this->scheduled_time,
            ]);
        } else {
            // Create new lesson
            Lesson::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'content' => $this->content,
                'course_id' => $this->course_id,
                'scheduled_time' => $this->scheduled_time,
            ]);
        }

        $this->showModal = false;
        $this->lessons = Lesson::all();
        $this->resetInputFields();
    }

    private function resetInputFields(): void
    {
        $this->editingLesson = new Lesson();
        $this->title = '';
        $this->content = '';
        $this->course_id = 1;
        $this->scheduled_time = '';
    }

    public function render(): View
    {
        return view('admin.lessons');
    }
}
