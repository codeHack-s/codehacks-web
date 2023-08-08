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
                <p>Attending: {{ $lesson->attending_members_count }}</p>
                @if (!Auth::user()->lessons->contains($lesson->id))
                    <form class="my-2 md:my-3" method="POST" action="{{ route('lesson.attend', $lesson) }}">
                        @csrf
                        @method('POST')
                        <p class="my-2 md:my-3 text-red-500">You are not attending !</p>
                        <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                        <x-primary-button class="ring-orange-400 w-[150px] rounded-full">
                            Attend <i class="fa-solid fa-graduation-cap"></i>
                        </x-primary-button>
                    </form>
                @else
                    <form class="my-2 md:my-3" method="POST" action="{{ route('lesson.unattend', $lesson) }}">
                        @csrf
                        @method('POST')
                        <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                        <p class="my-2 md:my-3 text-green-500">You are attending the lesson</p>
                        <x-primary-button class="ring-orange-400 rounded-full">
                            Un-attend <i class="fa-solid fa-minus-circle"></i>
                        </x-primary-button>
                    </form>
                @endif

                @can('manage')
                    <div class="flex gap-3 items-center">
                        <a href="{{ route('lessons.edit', $lesson) }}">
                            <x-round-button class="btn hover:bg-blue-500">
                                <i class="fa-solid fa-edit"></i>
                            </x-round-button>
                        </a>
                        <form method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                            @csrf
                            @method('DELETE')
                            <x-round-button type="submit" class="btn hover:bg-red-500 btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </x-round-button>
                        </form>
                    </div>

                @endcan
            </div>
        </div>
    </section>
</x-app-layout>
