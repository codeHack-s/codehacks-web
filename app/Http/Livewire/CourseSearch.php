<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CourseSearch extends Component
{
    public string $search = '';
    use WithPagination;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.course-search', [
            'courses' => Course::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('online', 'like', '%' . $this->search . '%')
                ->paginate(10)
        ]);
    }
}
