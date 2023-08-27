<div>
    <section class="Raccoon Search m-3 w-full flex gap-4 items-center justify-end">
        @can('manage')
            <div data-tip="Create a new course" class="tooltip">
                <a href="{{ route('courses.create') }}">
                    <button class="btn btn-circle ring btn-sm">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </a>
            </div>
        @endcan
        <div class="w-full sm:w-1/4 sm:mx-4">
            <label class="relative">
                <input class="input input-bordered h-10 w-full max-w-xs" wire:model="search" type="text" placeholder="Search any text...">
                <span class="absolute top-[-10px] right-1 text-[10px] text-gray-500">Powered by Raccoon</span>
            </label>
        </div>
    </section>

    <!-- if no courses are found -->
    @if ($courses->isEmpty())
        <div class="flex justify-center items-center">
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-72 h-72" alt="No courses found">
                <h1 class="text-3xl text-gray-700 font-semibold">No courses found</h1>
            </div>
        </div>
    @else
        <table class="table table-zebra bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th class="hidden md:block">Description</th>
                <th>Online</th>
                <th class="hidden md:block">Image</th>
                <th>Actions</th>
            </tr>
            </thead>

            @foreach($courses as $course)
                <tr class="items-center my-3">
                    @php
                        //Auth::user()->courses->contains($course->id)
                        $isRegistered = Auth::user()->courses->contains($course->id);
                    @endphp
                    <td>{{ $course->title }}
                        <span class="text-xs italic text-gray-500">
                            {{ $isRegistered ? '(Registered)' : '' }}
                        </span>
                    </td>

                    <!--Only 50 characters of the description are shown-->
                    <td class="w-[450px]">{{ Str::limit($course->description, 200) }}</td>
                    <td>{{ $course->online ? 'Yes' : 'No' }}</td>
                    <td class="hidden md:block"><img class="w-20 rounded-md " src="{{ $course->image_url }}" alt="{{ $course->title }}"></td>
                    <td>
                        <section class="flex gap-4">

                            <div data-tip="View {{ $course->title }}" class="tooltip">
                                <a href="{{ route('courses.show', $course) }}">
                                    <button class="btn btn-circle ring btn-sm">
                                        <i class="fa-solid fa-mountain"></i>
                                    </button>
                                </a>
                            </div>

                            @can('manage')

                                <div data-tip="Edit {{ $course->title }}" class="tooltip">
                                    <a href="{{ route('courses.edit', $course) }}">
                                        <button class="btn btn-circle ring btn-sm">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    </a>
                                </div>


                                <div data-tip="Delete {{ $course->title }}" class="tooltip">
                                    <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-circle ring btn-sm ring-red-500" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- view all students enrolled in this course -->
                                <div data-tip="View all students enrolled in {{ $course->title }}" class="tooltip">
                                    <a href="{{ route('courses.students', $course) }}">
                                        <button class="btn btn-circle ring btn-sm">
                                            <i class="fa-solid fa-users"></i>
                                        </button>
                                    </a>
                                </div>

                            @endcan
                        </section>
                    </td>
                </tr>
            @endforeach

        </table>
    @endif

    <section class="w-full my-3">
        {{ $courses->links() }}
    </section>

</div>
