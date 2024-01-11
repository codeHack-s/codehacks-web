<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-4 sm:px-6 lg:px-8">
            <div class="sm:rounded-lg mt-10">

                <div class="welcome mb-5 w-full ring-1 ring-offset-1 ring-gray-500 rounded-md p-2 sm:p-4">
                    <h3 class="font-semibold text-xl mb-2">
                        Hello, {{ auth()->user()->name }} 👋
                    </h3>
                    <p class="text-sm">
                        Welcome to the last CodeHack. We are glad to have you here.
                    </p>

                    <p class="text-sm">
                        You can check the upcoming courses below or check our Github repository
                        <br>
                        <a class="text-blue-600 text-sm" href="https://github.com/codeHack-s/last-codehack">
                            here <i class="fa-brands fa-github"></i>
                        </a>
                        <br>
                        For regular updates, join our whatsapp group
                        <br>
                        <a class="text-blue-600 text-sm" href="https://chat.whatsapp.com/F9h3tU2kTISAIDIh6UWYtE">
                            here <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </p>
                </div>

                <center>
                    <h1 class="mb-5 text-center text-3xl font-semibold">
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
