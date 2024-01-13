<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-mg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">User Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus text-white"></i>     User</a>
                </div>
                <div class="flex flex-col">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="min-w-full divide-y divide-gray-200">
                                <table class="min-w-full divide-y devide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> User ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                            <th scope="col" class="px-5 py-3 flex justify-end text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles & Permission | Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                   <a href="{{ route('admin.activity.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 rounded p-2">  {{ $user->id }} </a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    {{ $user->email }}
                                                </div>
                                            </td>
                                            @if ($user->roles)
                                            @foreach ($user->roles as $user_role)
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    {{ $user_role->name }}
                                                </div>
                                            </td>
                                            @endforeach
                                            @endif
                                            <td>
                                                <div class="items-center pl-5">
                                                    <div class="flex justify-end space-x-6 pr-6">
                                                        <a href="{{ route('admin.users.show', $user->id) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md">
                                                            <i class="fa-solid fa-cog pr-3"></i>
                                                            <i class="fa-solid fa-shield"></i>
                                                        </a>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
