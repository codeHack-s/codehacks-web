<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="flex w-full">
        <div class="w-full sm:px-6 lg:px-8">

            <div class="p-3 sm:p-5 text-gray-900 ">

                <!-- Display greeting according to time of day -->
                <div class="mb-4">

                    <h3 class="text-lg font-semibold">{{ __('Welcome') }}</h3>

                    <p>
                        @php
                            $hour = date('H');
                            if ($hour >= 5 && $hour <= 11) {echo "Good Morning";} else if ($hour >= 12 && $hour <= 18) { echo "Good Afternoon";} else if ($hour >= 19 || $hour <= 4) {echo "Good Evening";}
                        @endphp
                        {{ Auth::user()->first_name  }} {{ Auth::user()->last_name  }}
                    </p>

                    <!-- Display User Balance -->
                    <div class="mb-4">
                    </div>

                    <div class="mb-4 w-full flex flex-wrap gap-4">
                        <div class="card w-full sm:w-5/12 p-0 rounded bg-base-100 shadow">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">
                                    <!-- User Package -->
                                    Membership Plan
                                </h2>
                                <p>Your membership plan is <span class="font-sans font-bold text-orange-700 text-2xl">{{ Auth::user()->subscription_status}}</span></p>
                                <div class="card-actions gap-3 justify-end">
                                    <button class="btn ring ring-blue-700 btn-circle hover:bg-base-100">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </button>
                                    <!--Change Membership-->
                                    <a class="tooltip" data-tip="Pricing Plans" href="{{ route('pricing.index') }}">
                                        <button class="btn hover:bg-base-100 ring ring-orange-700 btn-circle">
                                            <i class="fa-solid fa-code"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Display User Activity -->
                        <div class="card w-full sm:w-5/12 p-0 rounded bg-base-100 shadow">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">Activity</h2>
                                <p class="w-full">Online session time
                                    <span id="timeOnline" class="font-sans font-bold text-orange-700 text-2xl min-w-[100px]"></span>
                                </p>
                                <div class="card-actions justify-end">
                                    <button class="btn ring ring-orange-700 btn-circle">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Display Next Lesson -->
                        @php
                            $nextLesson = Auth::user()->nextLesson();
                        @endphp

                        <div class="card w-full sm:w-5/12 p-0 rounded bg-base-100 shadow">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">Meeting</h2>
                                <p>Next lesson in
                                    <span id="next" class="font-sans font-bold text-orange-700 text-2xl">
                                        @if($nextLesson)
                                            {{ $nextLesson->date->diffForHumans() }}
                                        @else
                                            No upcoming lessons
                                        @endif
                                    </span>
                                </p>
                                @if ($nextLesson)
                                    <div class="flex flex-col gap-2 sm:flex-row items-center justify-between bg-base-100">
                                        <div class="flex items-center gap-2 w-full sm:w-1/2 space-x-2">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-calendar text-3xl text-orange-700"></i>
                                            </div>
                                            <div>
                                                <h2 class="text-lg font-semibold">{{ Str::words($nextLesson->title, 3) }}</h2>
                                                <p class="text-sm">{{ Str::words($nextLesson->description, 13) }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 w-full h-full sm:w-1/2">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-clock text-3xl text-orange-700"></i>
                                            </div>
                                            <div class="h-full flex flex-col items-start">
                                                <h2 class="text-lg font-semibold">Registered {{ $nextLesson->registered_members_count }}</h2>
                                                <p class="text-sm">Venue : {{ $nextLesson->venue }}
                                                    <br>
                                                    <span class="text-xs text-gray-500 italic">
                                                        This venue is subject to change. If there is any change, you will be notified.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                @else
                                    <p>No upcoming lessons.</p>
                                @endif
                                <div class="card-actions justify-end">
                                    @if ($nextLesson)
                                        <a href="{{ route('lessons.show', $nextLesson) }}">
                                            <button class="btn ring ring-orange-700 btn-circle">
                                                <i class="fa-solid fa-mountain"></i>
                                            </button>
                                        </a>
                                    @else
                                        <button class="btn ring ring-orange-700 btn-circle">
                                            <i class="fa-solid fa-mountain"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Display Registered Courses -->

                        <div class="card w-full sm:w-5/12 p-0 rounded bg-base-100 shadow">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">Registered Courses</h2>
                                <p>You have
                                    <span id="registeredCourses" class="font-sans font-bold text-orange-700 text-2xl">
                                                {{ Auth::user()->registered_courses_count() }}
                                            </span>
                                    registered course(s).
                                </p>
                                <div class="card-actions justify-end">
                                            <span class="tooltip" data-tip="View Registered Courses">
                                                <a href="{{ route('courses.index') }}">
                                                    <button class="btn ring ring-orange-700 btn-circle">
                                                        <i class="fa-solid fa-mountain"></i>
                                                    </button>
                                                </a>
                                            </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    <script>
        function updateTimeDifference(startTime, elementId) {
            let currentTime = new Date();
            let timeDiffInSeconds = Math.floor((currentTime - startTime) / 1000); // in seconds
            let isNegative = timeDiffInSeconds < 0;

            let timeDiff = Math.abs(timeDiffInSeconds); // Get absolute value

            let seconds = (timeDiff % 60).toString().padStart(2, "0"); // extract seconds
            timeDiff = Math.floor(timeDiff / 60); // convert to minutes
            let minutes = (timeDiff % 60).toString().padStart(2, "0"); // extract minutes
            timeDiff = Math.floor(timeDiff / 60); // convert to hours
            let hours = (timeDiff % 24).toString().padStart(2, "0"); // extract hours
            let days = Math.floor(timeDiff / 24); // extract days

            let formattedTime = '';

            if (days > 0) {
                formattedTime += days + 'd ';
            }
            formattedTime += hours + 'h ' + minutes + 'm ' + seconds + 's';

            document.getElementById(elementId).textContent = formattedTime;
        }

        let startTime = new Date('{{ Auth::user()->last_login_at }}');
        setInterval(function() {
            updateTimeDifference(startTime, 'timeOnline');
            updateNextLessonTime();
        }, 1000);

        @if($nextLesson)
        function updateNextLessonTime() {
            let nextLessonStart = new Date('{{ $nextLesson->date }}');
            updateTimeDifference(nextLessonStart, 'next');
        }
        @endif

    </script>

</x-app-layout>
