<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Verdict Panel</span>
                <hr>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Code</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File With Comments</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($acceptedmanuscripts as $acceptedmanuscripts)
                                        @if (Auth::user()->id == $acceptedmanuscripts->user_id)
                                        <tr class="">
                                            <td class="px-6 py-4">
                                                <div class=" items-center bg-green-500 text-white rounded pl-3">
                                                    {{ $acceptedmanuscripts->rev_stat_status }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class=" items-center">
                                                    {{ $acceptedmanuscripts->manuscript_id }}
                                                </div>
                                            </td>
                                             <td class="px-6 py-4">
                                                <div class=" items-center">
                                                    {{ $acceptedmanuscripts->file }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="items-center">
                                                    <div class="flex justify-end space-x-6">
                                                        <a href="{{ route('author.acceptedmanuscript.shows', $acceptedmanuscripts->id) }}"
                                                            class="px-4 py-2 bg-violet-500 hover:bg-violet-700 text-white rounded-md"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('author.acceptedmanuscript.downloadss', $acceptedmanuscripts->file) }}"
                                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-md"><i class="fa-solid fa-download"></i></a>

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
</x-author-layout>
