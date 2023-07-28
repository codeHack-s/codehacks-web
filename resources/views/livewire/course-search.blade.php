<div>
    <section class="Raccoon Search m-3 w-full flex justify-end">
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
                <th>Description</th>
                <th>Online</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>

            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->online ? 'Yes' : 'No' }}</td>
                    <td><img class="w-20 rounded-md " src="{{ $course->image_url }}" alt="{{ $course->title }}"></td>
                    <td>
                        <section class="flex gap-2">
                            <a href="{{ route('courses.show', $course) }}">
                                <button class="btn btn-circle ring btn-sm">
                                    <i class="fa-solid fa-mountain"></i>
                                </button>
                            </a>
                            @if(Auth::user()->email == 'tomsteve187@gmail.com')
                                <a href="{{ route('courses.edit', $course) }}">
                                    <button class="btn btn-circle ring btn-sm">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-circle ring btn-sm ring-red-500" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endif
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
