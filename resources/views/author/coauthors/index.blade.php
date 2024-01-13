<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Author Information Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('author.coauthors.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-plus text-white"></i>    Co-Authors</a>
                </div>
                <div class="flex flex-col">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-lg border-b border-gray-200 sm:rounded-lg">
                            <div class="min-w-full divide-y divide-gray-200">
                                <table class="min-w-full divide-y devide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript ID</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Author ID</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Code</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Lastnames(s)</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email(s)</th>
                                            <th scope="col" class="p-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Affiliation(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($authormanuscripts as $mama)
                                        @if (Auth::user()->id == $mama->user_id)
                                        <tr>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $mama->id }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->manu_id }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->au_id }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->manuscript_id }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->au_manu_Lname }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->au_manu_email }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center">
                                                <div class="flex items-center">
                                                    {{ $mama->au_manu_affiliation }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="items-center pl-5">
                                                    <div class="flex justify-end space-x-6 pr-6">
                                                        <form action="{{ route('author.coauthors.destroy', $mama->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
