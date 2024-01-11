<div>
    <!-- Resources Table -->
    <h2 class="text-center text-xl font-semibold">Resources</h2>
    <table class="table mb-5 table-zebra ring-1 text-xs rounded-md overflow-hidden mt-3">
        <thead>
        <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Type</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->name }}</td>
                <td>{{ $resource->url }}</td>
                <td>{{ $resource->type }}</td>
                <td>{{ $resource->description }}</td>
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
