<x-app-layout>

    @include('session.alerts')

    <center class="sm:text-3xl text-2xl text-gray-700 font-semibold">Developers enrolled in {{ $lesson->title }}</center>

    <section class="flex flex-col justify-center items-center ">
        <table class="table table-zebra">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>

            @foreach($students as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- view all courses enrolled in by this user -->
                        <div data-tip="View all courses enrolled in by {{ $user->username}}" class="tooltip">
                            <a href="{{ route('courses.user', $user) }}">
                                <button class="btn btn-circle ring btn-sm">
                                    <i class="fa-solid fa-mountain"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>
