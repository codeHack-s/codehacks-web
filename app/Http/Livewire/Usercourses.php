<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use App\Models\Course;
use App\Models\User;
use Livewire\WithPagination;

class Usercourses extends Component
{
    public string $search = '';
    public User $user;
    use WithPagination;

    public function mount(User $user): void
    {
        if (Gate::allows('manage') || Auth::id() == $user->id) {
            $this->user = $user;
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = $this->user->courses()
            ->where('title', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.usercourses', compact('courses'));
    }
}
