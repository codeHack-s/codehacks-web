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
    @if ($lessons->isEmpty())

        <div class="flex justify-center items-center">
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-72 h-72" alt="No courses found">
                <h1 class="text-3xl text-gray-700 font-semibold">No lessons</h1>
            </div>
        </div>

    @else
        <div class="overflow-x-clip">
            <table class="table table-zebra-zebra">
                <thead>
                <tr class="bg-gray-200">
                    <th>Title</th>
                    <th>Date</th>
                    <th class="hidden md:block">Description</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @foreach($lessons as $lesson)
                    <tr class="items-center">
                        <td>{{ $lesson->title }}</td>

                        <td>

                            <span id="date-{{ $lesson->id }}">
                                {{ $lesson->date->format('d/m/Y') }}
                            </span>

                        </td>
                        <td class="hidden md:block">{{ $lesson->description }}</td>
                        <td>{{ $lesson->venue}}</td>
                        <td>
                            <section class="flex gap-4">

                                <div data-tip="View {{ $lesson->title }}" class="tooltip">
                                    <a href="{{ route('lessons.show', $lesson) }}">
                                        <button class="btn btn-circle ring btn-sm">
                                            <i class="fa-solid fa-mountain"></i>
                                        </button>
                                    </a>
                                </div>

                                @can('manage')

                                    <div data-tip="Edit {{ $lesson->title }}" class="tooltip">
                                        <a href="{{ route('lessons.edit', $lesson) }}">
                                            <button class="btn btn-circle ring btn-sm">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                        </a>
                                    </div>


                                    <div data-tip="Delete {{ $lesson->title }}" class="tooltip">
                                        <form method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-circle ring btn-sm ring-red-500" type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- view all students enrolled in this course -->
                                    <div data-tip="View all students attending {{ $lesson->title }}" class="tooltip">
                                        <a href="{{ route('lessons.students', $lesson) }}">
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
        </div>
    @endif

    <section class="w-full my-3">
        {{ $lessons->links() }}
    </section>

    <script>
        let dates = @json($lessons->pluck('date', 'id'));

        for (let id in dates) {
            setInterval(function() {
                let now = new Date().getTime();
                var targetDate = new Date(dates[id]);
                var distance = targetDate - now;

                var days = Math.floor(Math.abs(distance) / (1000 * 60 * 60 * 24));
                var hours = Math.floor((Math.abs(distance) % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((Math.abs(distance) % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((Math.abs(distance) % (1000 * 60)) / 1000);

                var result = days + "dys  " + hours + "hr  " + minutes + "m  " + seconds + "s";

                // if the distance is less than 0, the lesson has expired
                if (distance < 0) {
                    result += "&nbsp <span class='badge badge-accent text-red-500'>EXPIRED</span>";
                }

                document.getElementById("date-" + id).innerHTML = result;
            }, 1000);
        }
    </script>


</div>
