<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Lessons extends Component
{
    public string $search = '';
    use WithPagination;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $userType = Auth::user()->user_type;

        return view('livewire.lessons', [
            'lessons' => Lesson::whereHas('course', function ($query) use ($userType) {
                $query->where('for', $userType);
            })
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('venue', 'like', '%' . $this->search . '%')
                        ->orWhere('date', 'like', '%' . $this->search . '%');
                })
                ->paginate(10)
        ]);
    }
}
