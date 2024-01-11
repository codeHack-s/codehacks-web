<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

                <center>
                    <h1 class="mt-10 mb-5 text-center text-3xl font-semibold">
                        Upcoming Courses
                    </h1>
                </center>


                @if($courses->count())
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                        @foreach($courses as $course)
                            <div class="">
                                @livewire('course-registration', ['course' => $course])
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No courses available.</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
