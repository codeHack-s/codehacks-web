<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AdminResources extends Component
{
    public Collection $resources;
    public Collection $lessons;
    public Resource $editingResource;
    public int $lesson_id;
    public string $name = '';
    public string $url = '';
    public string $type = '';
    public string $description = '';

    public bool $showModal = false;

    public function mount(): void
    {
        $this->resources = Resource::all();
        $this->lessons = Lesson::all();
    }

    public function editResource($resourceId): void
    {
        $this->editingResource = Resource::find($resourceId);
        $this->lesson_id = $this->editingResource->lesson_id;
        $this->name = $this->editingResource->name;
        $this->url = $this->editingResource->url;
        $this->type = $this->editingResource->type;
        $this->description = $this->editingResource->description;
        $this->showModal = true;
    }

    public function deleteResource($resourceId): void
    {
        $resource = Resource::find($resourceId);
        $resource->delete();
        $this->resources = Resource::all();
    }

    public function createNewResource(): void
    {
        $this->resetInputFields();
        $this->showModal = true;
    }

    public function saveResource(): void
    {
        if (isset($this->editingResource->id)) {
            // Update existing resource
            $this->editingResource->update([
                'lesson_id' => $this->lesson_id,
                'name' => $this->name,
                'url' => $this->url,
                'type' => $this->type,
                'description' => $this->description,
            ]);
        } else {
            // Create new resource
            Resource::create([
                'lesson_id' => $this->lesson_id,
                'name' => $this->name,
                'url' => $this->url,
                'type' => $this->type,
                'description' => $this->description,
            ]);
        }

        $this->showModal = false;
        $this->resources = Resource::all();
        $this->resetInputFields();
    }

    private function resetInputFields(): void
    {
        $this->editingResource = new Resource();
        $this->lesson_id = 0;
        $this->name = '';
        $this->url = '';
        $this->type = '';
        $this->description = '';
    }

    public function render(): View
    {
        return view('admin.resources');
    }
}
