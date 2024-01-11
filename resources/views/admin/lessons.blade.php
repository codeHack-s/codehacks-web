<div>
    <!-- Lessons Table -->
    <h2 class="text-center text-xl font-semibold">Lessons</h2>
    <div class="flex justify-end">
        <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1"
                wire:click="createNewLesson">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
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
                    <button wire:click="editLesson({{ $lesson->id }})"
                            class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    <button wire:click="deleteLesson({{ $lesson->id }})"
                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <!--Modal-->
<dialog id="lesson_modal" class="modal bg-gray-100 bg-opacity-60 z-50" {{$showModal ? 'open' : ''}}>
    <div class="modal-box">
        <h3 class="font-bold  text-lg">Add Lesson</h3>
        <form class="flex flex-col" wire:submit.prevent="saveLesson">
            <div class="py-4 text-gray-100 flex flex-col">
                <label for="title">Title</label>
                <input type="text" id="title" wire:model="title" class="input text-xs input-info text-gray-100">

                <label for="slug">Slug</label>
                <input type="text" id="slug" wire:model="slug" class="input input-info text-xs text-gray-100">

                <label for="content">Content</label>
                <textarea id="content" wire:model="content" class="textarea textarea-info text-xs text-gray-100"></textarea>

                <label for="course_id">Course</label>
                <select id="course_id" wire:model="course_id" class="input input-info text-xs text-gray-100">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }} {{ $course->id }}</option>
                    @endforeach
                </select>

                <label for="scheduled_time">Scheduled Time</label>
                <input type="datetime-local" id="scheduled_time" wire:model="scheduled_time" class="input input-info text-xs text-gray-100">
            </div>
            <div class="modal-action py-4 gap-2 flex w-full">
                <button type="submit" class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-gray-100">
                    Save
                    <i class="fa-solid fa-check"></i>
                </button>
                <button type="button" class="btn w-1/2 btn-sm ring-1 ring-inset ring-offset-1 ring-offset-error" onclick="let lesson_modal = document.getElementById('lesson_modal');
                lesson_modal.close()">
                    Cancel
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </form>
    </div>
</dialog>

</div>
