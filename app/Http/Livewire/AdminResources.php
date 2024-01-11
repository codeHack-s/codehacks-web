<?php

namespace App\Http\Livewire;

use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminResources extends Component
{
    public $resources;
    public function mount(): void
    {
        $this->resources = Resource::all();
    }
    public function render(): View
    {
        return view('admin.resources');
    }
}
