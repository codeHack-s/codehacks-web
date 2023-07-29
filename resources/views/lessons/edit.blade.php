<x-app-layout>

    <center class="text-2xl md:text-3xl text-gray-700 font-semibold my-4 md:my-6">Create a Lesson</center>

    @include('session.alerts')

    <div class="container">
        <h2>Edit Lesson</h2>
        <form method="POST" action="{{ route('lessons.update', $lesson) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-select" name="course_id" id="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" @if($course->id == $lesson->course_id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add fields for other properties -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
