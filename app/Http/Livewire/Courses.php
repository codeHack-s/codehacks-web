<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    public function render(): View
    {
        return view('courses.index'
    , [
                'courses' => Course::paginate(16),
            ]
        );
    }
}
