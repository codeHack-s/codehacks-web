<div>
    <!-- Lessons Table -->
    <h2 class="text-center text-xl font-semibold">Lessons</h2>
    <table class="table mb-5 table-zebra ring-1 text-xs rounded-md overflow-hidden mt-3">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->content }}</td>
                <td class="flex gap-2" colspan="4">
                    <button class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    <button
                        class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 ring-error btn-error">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
