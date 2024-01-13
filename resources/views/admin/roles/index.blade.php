<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Role Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus text-white"></i>     Role</a>
                </div>
                <div class="flex flex-col">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-lg overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="min-w-full divide-y divide-gray-200">
                                <table class="min-w-full divide-y devide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $role->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="items-center">
                                                    <div class="flex space-x-5">
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md"><i class="fa-solid fa-file-pen"></i></a>
                                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
