<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-2 sm:px-3 lg:px-4">
            <div class="sm:rounded-lg relative">

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center w-full">
                    <div class="title">
                        <h1 class="mt-10 mb-1 text-3xl font-semibold">
                            {{ $course->title }}
                        </h1>
                        <div class="font-semibold text-xs mb-3 left-1">
                            This course has {{ $course->lessons->count() }} lessons.
                        </div>
                    </div>

                    <div class="register mb-4 sm:mb-0 sm:mt-4 w-44">
                        @livewire('course-registration-btn', ['course' => $course])
                    </div>
                </div>

                <div class="aspect-w-16 aspect-h-10 sm:aspect-h-5 overflow-hidden">
                    <img class="aspect-content sm:rounded-t-lg rounded-t-sm w-full object-cover"
                         src="{{asset('storage/1693925608.jpg')}}"
                         alt="product image"/>
                </div>

                <div class="info flex py-4 flex-col sm:flex-row w-full shadow rounded-b-md sm:rounded-b-lg">

                    <div class="description sm:w-8/12 p-1 sm:p-2">
                        <h5 class="text-xl mb-4 font-semibold tracking-tight">
                            Description
                            </h5>
                        <p class="text-sm font-semibold">
                            {{ $course->description }}
                        </p>
                    </div>

                    <div class="actions p-1 sm:p-2 w-full flex flex-col gap-3 sm:w-1/4 text-xs">
                        <div class="flex flex-col gap-2">
                            <span>
                                Fist Lesson
                                <br>
                                <b>{{ \Carbon\Carbon::parse($course->start_date)->format('l F Y') }}</b>
                            </span>
                            <span>
                                Last Lesson
                                <br>
                                <b>
                                    {{ \Carbon\Carbon::parse($course->end_date)->format('l F Y') }}
                                </b>
                            </span>
                        </div>

                        @livewire('course-calendar', ['startDate' => $course->start_date, 'endDate' => $course->end_date, 'course' => $course ])
                    </div>

                </div>


                <!-- Lessons -->

            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($course->lessons as $lesson)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lesson->title }}</td>
                            <td>{{ $lesson->description }}</td>
                            <td>{{ $lesson->scheduled_time->format('l F jS Y') }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
