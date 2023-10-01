<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
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

    public function render(): View
    {
        $userType = Auth::user()->user_type;

        //if the user can:manage
        if(Auth::user()->can('manage')){
            return view('livewire.course-search', [
                'courses' => Course::where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('online', 'like', '%' . $this->search . '%')
                    ->paginate(10)
            ]);
        }else{
            return view('livewire.course-search', [
                'courses' => Course::where('for', $userType)
                    ->where(function ($query) {
                        $query->where('title', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->orWhere('online', 'like', '%' . $this->search . '%');
                    })
                    ->paginate(10)
            ]);
        }
    }
}
