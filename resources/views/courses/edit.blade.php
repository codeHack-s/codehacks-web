<x-app-layout>
    <center class="text-2xl md:text-3xl text-gray-700 font-semibold my-4 md:my-6">Edit {{ $course->title }}</center>

    @include('session.alerts')

    <div class="flex justify-center items-center w-full">
        <form method="POST" class="flex flex-col gap-2 w-full max-w-xs" action="{{ route('courses.update', $course) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <x-text-input type="text" id="title" name="title" value="{{ $course->title }}" required />

        <label for="description">Description:</label>
        <textarea class="textarea textarea-info" id="description" name="description" required>{{ $course->description }}</textarea>

            <section class="online-input flex gap-2 items-center">
                <label for="online">Online:</label>
                <input type="checkbox" id="online" name="online" {{ $course->online ? 'checked' : '' }}>
                </section>

        <label for="image">Course Image:</label>
        <input class="file-input" type="file" id="image" name="image">

            <section data-tip="Add Course" class="flex my-3 justify-center tooltip items-center">
                <x-round-button type="submit">
                    <i class="fa-solid fa-sd-card"></i>
                </x-round-button>
            </section>
    </form>
</x-app-layout>
