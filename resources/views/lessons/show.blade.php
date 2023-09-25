<x-app-layout>

    @include('session.alerts')

    <section class="py-2 sm:py-8">
        <div class="max-w-4xl mx-auto md:grid md:grid-cols-2 gap-6">

            <!-- Image Column -->
            <div class="flex justify-center items-center md:order-1">
                <div class="h-full rounded-md flex justify-center items-center">
                    <img src="{{ asset($lesson->svg) }}" alt="{{ $lesson->title }}" class="h-full bg-cover object-cover rounded-md">
                </div>
            </div>

            <!-- Details Column -->
            <div class="mt-4 md:mt-0 md:order-2">
                <div class="shadow-sm shadow-gray-400 rounded-lg p-6">
                    <h1 class="text-2xl md:text-3xl uppercase font-semibold mb-4">
                        <i class="fas fa-heading text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        {{ $lesson->title }}
                    </h1>
                    <p class="mb-2">
                        <i class="fas fa-info-circle text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        {{ $lesson->description }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-calendar-alt text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        Date: {{ $lesson->date->format('F j, Y') }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-map-marker-alt text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        Venue: {{ $lesson->venue }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-book text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        Course: {{ $lesson->course->title }}
                    </p>
                    <p class="">
                        <i class="fas fa-users text-gray-500 mr-2"></i> <!-- FontAwesome Icon -->
                        Attending: {{ $lesson->attending_members_count }}
                    </p>
                </div>


                <section class="flex items-center justify-center">
                    @if (!Auth::user()->lessons->contains($lesson->id))
                        <p class="my-2 md:my-3 text-red-500">Click the button below to Join us</p>
                    @else
                        <p class="my-2 md:my-3 text-green-500">You are attending the lesson 💪⚡</p>
                    @endif
                </section>

                <section class="flex flex-col px-6 border-gray-500 border-r-2 border-l-2 rounded md:flex-row justify-between mt-4 items-center">

                    <section class="flex flex-col md:flex-row justify-between mt-4 items-center">
                        @if (!Auth::user()->lessons->contains($lesson->id))
                            <div class="mb-4 md:mb-0">
                                <form onsubmit="return confirm('Are you sure you want to attend this lesson?');" class="my-2 md:my-3" method="POST" action="{{ route('lesson.attend', $lesson) }}">
                                    @csrf
                                    @method('POST')
                                    <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                                    <x-primary-button class="ring-orange-400 w-[150px] rounded-full">
                                        Attend <i class="fa-solid fa-graduation-cap"></i>
                                    </x-primary-button>
                                </form>
                            </div>
                        @else
                            <div class="mb-4 md:mb-0">
                                <form onsubmit="return confirm('Are you sure you want to un-attend this lesson?');" class="my-2 md:my-3" method="POST" action="{{ route('lesson.unattend', $lesson) }}">
                                    @csrf
                                    @method('POST')
                                    <input class="hidden" value="{{ Auth::user()->id }}" type="text" name="user_id">
                                    <x-primary-button class="ring-orange-400 rounded-full">
                                        Un-attend <i class="fa-solid fa-minus-circle"></i>
                                    </x-primary-button>
                                </form>
                            </div>
                        @endif
                    </section>

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

                    @else
                        <!-- view courses and lessons -->
                        <div class="flex gap-3 items-center">

                            <a data-tip="View the parent Course" class="tooltip" href="{{ route('courses.show', $lesson->course) }}">
                                <x-round-button class="btn hover:bg-blue-500">
                                    <i class="fa-solid fa-book"></i>
                                </x-round-button>
                            </a>

                            <a data-tip="View All Lessons" class="tooltip" href="{{ route('lessons.index') }}">
                                <x-round-button class="btn hover:bg-blue-500">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </x-round-button>
                            </a>

                        </div>

                    @endcan

                </section>


            </div>
        </div>
    </section>
</x-app-layout>
