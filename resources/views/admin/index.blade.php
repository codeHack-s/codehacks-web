<div>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-2 sm:px-3 lg:px-4">
            <div class="sm:rounded-lg relative">
                <div class="render mt-10 mb-1">
                    <!-- Courses Table -->
                    <h2 class="text-center text-xl font-semibold">Courses</h2>

                    <div class="flex justify-end">
                        <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1"
                                wire:click="createNewCourse">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <table class="table mb-5 table-zebra ring-1 text-xs rounded-md overflow-hidden mt-3">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->description }}</td>
                                <td class="flex gap-2" colspan="4">
                                    <button wire:click="editCourse({{ $course->id }})"
                                            class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button wire:click="deleteCourse({{ $course->id }})"
                                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Lessons Table -->
                    <h2 class="text-center text-xl font-semibold">Lessons</h2>
                    <table class="table mb-5 table-zebra ring-1 text-xs rounded-md overflow-hidden mt-3">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->content }}</td>
                                <td class="flex gap-2" colspan="4">
                                    <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Resources Table -->
                    <h2 class="text-center text-xl font-semibold">Resources</h2>
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
                                    <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <button
                                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!--Modal-->
                <dialog id="course_modal" class="modal bg-gray-100 bg-opacity-60 z-50" {{$showModal ? 'open' : ''}}>
                    <div class="modal-box">
                        <h3 class="font-bold  text-lg">Edit</h3>
                        <form class="flex flex-col" wire:submit.prevent="saveCourse">
                            <div class="py-4 text-gray-100 flex flex-col">
                                <label class=" " for="title">Title</label>
                                <input class="input text-xs input-info text-gray-100" type="text" id="title"
                                              wire:model="title">
                                <label class=" " for="slug">Slug</label>
                                <input id="slug" class="input input-info text-xs text-gray-100" type="text" wire:model="slug" placeholder="Slug">
                                <label class=" " for="description">Description</label>
                                <textarea class="textarea textarea-info text-xs text-gray-100" id="description"
                                          wire:model="description"></textarea>
                            </div>
                            <div class="modal-action py-4 gap-2 flex w-full">
                                <button type="submit"
                                        class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-gray-100">
                                    Save
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <button type="button" class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-error" onclick="let course_modal = document.getElementById('course_modal');
                                course_modal.close()">
                                    Cancel
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </dialog>
            </div>
        </div>
    </div>
</div>
