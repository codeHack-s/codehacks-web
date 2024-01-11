<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CourseCalendar extends Component
{
    public mixed $startDate;
    public mixed $endDate;
    public mixed $currentMonth;

    public Course $course;
    public array $days = [];

    public function mount($startDate, $endDate, $course): void
    {
        $this->startDate = new Carbon($startDate);
        $this->endDate = new Carbon($endDate);
        $this->currentMonth = $this->startDate->copy();
        $this->course = $course;
        $this->getCourseLessons();
        $this->generateCalendar();
    }

    public function render(): View
    {
        return view('livewire.course-calendar');
    }


    private function generateCalendar(): void
    {
        $startDay = $this->currentMonth->copy()->startOfMonth();
        $endDay = $this->currentMonth->copy()->endOfMonth();
        $lessonDates = $this->course->lesson_dates;
        $this->days = [];

        for ($date = $startDay; $date->lte($endDay); $date->addDay()) {
            $hasLesson = $lessonDates->contains($date->format('Y-m-d'));
            $this->days[] = [
                'date' => $date->copy(),
                'isInRange' => $date->between($this->startDate, $this->endDate),
                'hasLesson' => $hasLesson,
            ];
        }
    }


    public function goToNextMonth(): void
    {
        $this->currentMonth->addMonth();
        $this->generateCalendar();
    }

    public function goToPreviousMonth(): void
    {
        $this->currentMonth->subMonth();
        $this->generateCalendar();
    }

    private function getCourseLessons(): void
    {
        $lessons = $this->course->lessons();
        $lessons = $lessons->get();

        //TODO: refactor this
    }
}
