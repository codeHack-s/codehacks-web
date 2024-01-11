<div>

    <div class="py-12">
        <div class="max-w-7xl mx-aut px-2 sm:px-3 lg:px-4">
            <div class="sm:rounded-lg relative">
                <div class="render mt-10 mb-1">
                    @if($courses->count())
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                            @foreach($courses as $course)
                                <div class="">
                                    @livewire('course-registration', ['course' => $course])
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $courses->links() }}
                        </div>
                    @else
                        <p>No courses available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
