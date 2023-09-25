<x-app-layout>

    <section class="flex w-full">
        <div class="w-full sm:px-6 lg:px-8">

            <div class="p-3 sm:p-5 ">

                <!-- Table $users -->
                <table class="table table-zebra">
                    <thead class="bg-purple-400 text-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">
                            First Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">
                            Last Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">
                            Email
                        </th>
                        <!-- Add more columns headers as needed -->
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->first_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->email }}
                            </td>
                            <!-- Add more columns data as needed -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </section>

</x-app-layout>

