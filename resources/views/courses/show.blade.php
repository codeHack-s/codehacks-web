<x-app-layout>

    @include('session.alerts')

    <section class="bg-gray-100  px-2 sm:px-6 py-2 sm:py-8">
        <div class="max-w-4xl mx-auto md:flex">
            <div class="md:flex-shrink-0 md:mr-6">
                <img class="rounded-lg md:w-56" src="{{ $course->image_url }}" alt="{{ $course->title }}">
            </div>
            <div class="mt-4 flex flex-col gap-2 md:mt-0">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $course->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $course->description }}</p>
                @if (!Auth::user()->courses->contains($course->id))
                    <form class="my-2 md:my-3" method="POST" action="{{ route('courses.enroll', $course) }}">
                        @csrf
                        @method('POST')
                        <p class="my-2 md:my-3 text-red-500">You are not enrolled !</p>
                        <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                        <x-primary-button class="ring-orange-400 w-[150px] rounded-full">
                            Enroll <i class="fa-solid fa-graduation-cap"></i>
                        </x-primary-button>
                    </form>
                @else
                    <form class="my-2 md:my-3" method="POST" action="{{ route('courses.unenroll', $course) }}">
                        @csrf
                        @method('POST')
                        <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                        <p class="my-2 md:my-3 text-green-500">You are enrolled in this course!</p>
                        <x-primary-button class="ring-orange-400 rounded-full">
                            Unenroll <i class="fa-solid fa-minus-circle"></i>
                        </x-primary-button>
                    </form>
                @endif

            </div>
        </div>
    </section>
</x-app-layout>
