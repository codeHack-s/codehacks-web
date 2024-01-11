<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminLessons extends Component
{
    public $lessons;
    public function mount(): void
    {
        $this->lessons = Lesson::all();
    }
    public function render(): View
    {
        return view('admin.lessons');
    }
}
