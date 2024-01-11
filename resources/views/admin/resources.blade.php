<div>
    <!-- Resources Table -->
    <h2 class="text-center text-xl font-semibold">Resources</h2>
    <div class="flex justify-end">
        <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1"
                wire:click="createNewResource">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <table class="table mb-5 table-zebra ring-1 text-xs rounded-md overflow-hidden mt-3">
        <thead>
        <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Type</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->name }}</td>
                <td>{{ $resource->url }}</td>
                <td>{{ $resource->type }}</td>
                <td>{{ $resource->description }}</td>
                <td class="flex gap-2" colspan="4">
                    <button wire:click="editResource({{ $resource->id }})"
                            class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    <button wire:click="deleteResource({{ $resource->id }})"
                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--Modal-->
    <dialog id="resource_modal" class="modal bg-gray-100 bg-opacity-60 z-50" {{$showModal ? 'open' : ''}}>
        <div class="modal-box">
            <h3 class="font-bold  text-lg">Add Resource</h3>
            <form class="flex flex-col" wire:submit.prevent="saveResource">
                <div class="py-4 text-gray-100 flex flex-col">
                    <label for="lesson_id">Lesson</label>
                    <select id="lesson_id" wire:model="lesson_id" class="input input-info text-xs text-gray-100">
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>

                    <label for="name">Name</label>
                    <input type="text" id="name" wire:model="name" class="input text-xs input-info text-gray-100">

                    <label for="url">URL</label>
                    <input type="text" id="url" wire:model="url" class="input input-info text-xs text-gray-100">

                    <label for="type">Type</label>
                    <input type="text" id="type" wire:model="type" class="input input-info text-xs text-gray-100">

                    <label for="description">Description</label>
                    <textarea id="description" wire:model="description" class="textarea textarea-info text-xs text-gray-100"></textarea>
                </div>
                <div class="modal-action py-4 gap-2 flex w-full">
                    <button type="submit" class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-gray-100">
                        Save
                        <i class="fa-solid fa-check"></i>
                    </button>
                    <button type="button" class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-error" onclick="let resource_modal = document.getElementById('resource_modal');
                    resource_modal.close()">
                        Cancel
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</div>
