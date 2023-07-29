<x-app-layout>

    @include('session.alerts')

    <section class="bg-gray-100  px-2 sm:px-6 py-2 sm:py-8">
        <div class="max-w-4xl mx-auto md:flex">
            <div class="md:flex-shrink-0 md:mr-6">
                <!-- image -->
            </div>
            <div class="mt-4 flex flex-col gap-2 md:mt-0">
                <h1 class="text-2xl md:text-3xl text-gray-700 font-semibold my-4 md:my-6">{{ $lesson->title }}</h1>
                <p class="text-gray-600">{{ $lesson->description }}</p>
                <p class="text-gray-600">Date: {{ $lesson->date }}</p>
                <p class="text-gray-600">Venue: {{ $lesson->venue }}</p>
                <p class="text-gray-600">Course: {{ $lesson->course->title }}</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('lessons.edit', $lesson) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
