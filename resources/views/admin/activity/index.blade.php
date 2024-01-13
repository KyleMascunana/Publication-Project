<x-admin-layout>

        <div class="py-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                    <span class="text-xl px-4 py-2 p-4 text-sm uppercase text-gray-500">
                        <i class="fa-solid fa-clock"></i>     Activity Logs Panel</span>
                    <hr class="pb-3">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fa-solid fa-clock"></i>    Time (Created)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fa-solid fa-clock"></i>    Time (Updated)</th>
                                <th></th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fa-solid fa-id-card-clip"></i>    User ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fa-solid fa-file"></i>    Description</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fa-solid fa-user"></i>   Logged Name</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($activities as $activity)
                                            <tr>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center text-green-500">
                                                       {{ $activity->created_at }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center text-red-500">
                                                        {{ $activity->updated_at }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class=" items-center">

                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <a href="{{ route('admin.users.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 rounded p-2">
                                                                {{ $activity->subject_id }} </a>
                                                    </div>
                                                </td>
                                                 <td class="px-6 py-4">
                                                    <div class="flex items-center text-violet-500 uppercase">
                                                        {{ $activity->description }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2">
                                                    <div class="flex items-center text-blue-500 uppercase">
                                                        {{ $activity->log_name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-admin-layout>

