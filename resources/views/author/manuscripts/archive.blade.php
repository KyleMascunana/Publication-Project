<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto xl:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Information Panel</span>
                <div class="flex flex-col">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-lg border-b border-gray-200 sm:rounded-lg">
                            <div class="min-w-full divide-y divide-gray-200">
                                <table class="min-w-full divide-y devide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author's Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Type</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Type</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Name</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($manuscripts as $manuscript)
                                        @if (Auth::user()->id == $manuscript->user_id)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $manuscript->manuscript_id }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    {{ $manuscript->au_fname }} {{ $manuscript->au_lname }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    {{ $manuscript->manu_type }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    {{ $manuscript->manu_title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    {{ $manuscript->manu_file_type }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    {{ $manuscript->file }}
                                                </div>
                                            </td>

                                            <td >
                                                <div class="items-center">
                                                    <div class="flex space-x-3">
                                                        <form action="{{ route('author.manuscripts.restore', $manuscript->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md"><i class="fa-solid fa-rotate-left"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="items-center">
                                                    <div class="flex space-x-3">
                                                        <form action="{{ route('author.manuscripts.destroy', $manuscript->id) }}" method="POST" onsubmit="return confirm('Are you sure? Data will be Deleted Permanently!');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
</x-author-layout>
