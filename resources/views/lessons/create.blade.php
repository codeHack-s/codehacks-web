<x-app-layout>

    <center class="text-2xl md:text-3xl text-gray-700 font-semibold my-4 md:my-6">Create a New Lesson</center>

    @include('session.alerts')

    <div class="flex justify-center items-center w-full">

        <form class="flex flex-col gap-2 w-full max-w-xs" method="POST" action="{{ route('lessons.store') }}">
            @csrf
            <div class="mb-3 w-full">
                <label for="course_id" class="label">Course</label>
                <select class="select w-full select-info" name="course_id" id="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 w-full">
                <label for="title" class="label">Title</label>
                <input type="text" class="input input-info w-full" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3 w-full">
                <label for="description" class="label">Description</label>
                <textarea class="textarea textarea-info w-full" name="description" id="description" required>{{ old('description') }}</textarea>
            </div>

            <!--date-->
            <div class="mb-3 w-full">
                <label for="date" class="label">Date</label>
                <input type="datetime-local" class="input input-info w-full" name="date" id="date" value="{{ old('date') ? \Carbon\Carbon::parse(old('date'))->format('Y-m-d\TH:i') : '' }}" required>
            </div>


            <!--venue-->
            <div class="mb-3 w-full">
                <label for="venue" class="label">Venue</label>
                <input type="text" class="input input-info w-full" name="venue" id="venue" value="{{ old('venue') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
