<x-app-layout>
    <center class="text-2xl md:text-3xl text-gray-700 font-semibold my-4 md:my-6">Create a New Course</center>

    @include('session.alerts')

    <div class="flex justify-center items-center w-full">
        <form method="POST" class="flex flex-col gap-2 w-full max-w-xs" action="{{ route('courses.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <x-text-input type="text" id="title" name="title" :value="old('title')" required />

            <label for="description">Description:</label>
            <textarea class="textarea-info textarea" id="description" name="description" :value="old('description')" required></textarea>

            <section class="online-input flex gap-2 items-center">
                <label for="online">Check if online:</label>
                <input type="checkbox" id="online" name="online" :value="old('online')" >
            </section>

            <label for="image">Course Image:</label>
            <input class="file-input" type="file" id="image" name="image" required>

            <section data-tip="Add Course" class="flex my-3 justify-center tooltip items-center">
                <x-round-button type="submit">
                    <i class="fa-solid fa-plus"></i>
                </x-round-button>
            </section>

        </form>
    </div>
</x-app-layout>
