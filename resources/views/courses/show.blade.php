<x-app-layout>
    <section class="bg-gray-100 px-6 py-8">
        <div class="max-w-4xl mx-auto md:flex">
            <div class="md:flex-shrink-0 md:mr-6">
                <img class="rounded-lg md:w-56" src="{{ $course->image_url }}" alt="{{ $course->title }}">
            </div>
            <div class="mt-4 flex flex-col gap-2 md:mt-0">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $course->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $course->description }}</p>
                <a href="{{ route('courses.enroll', $course) }}" class="my-2 md:my-3">
                    <x-primary-button class="ring-orange-400 rounded-full">
                        Enroll <i class="fa-solid fa-graduation-cap"></i>
                    </x-primary-button>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>

