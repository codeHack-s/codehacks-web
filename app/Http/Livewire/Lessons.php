<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithPagination;

class Lessons extends Component
{
    public string $search = '';
    use WithPagination;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.lessons', [
            'lessons' => Lesson::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('venue', 'like', '%' . $this->search . '%')
                ->orWhere('date', 'like', '%' . $this->search . '%')
                ->paginate(10)
            ]);
    }
}
