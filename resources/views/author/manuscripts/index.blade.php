<x-author-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                                @foreach ($manuscripts as $manuscript)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                             <p><i class="fa-solid fa-cloud fa-beat"></i><span class="pl-2">{{ $manuscript->manu_type }}</span> </p>
                                             <p>|</p>
                                             <p><i class="fa-solid fa-calendar fa-beat"></i><span class="pl-2">{{ $manuscript->created_at }}</span> </p>
                                             <p>|</p>
                                            <p> <i class="fa-solid fa-bookmark fa-beat"></i><span class="pl-2">{{ $manuscript->manuscript_id }}</span> </p>
                                        </div><br>

                                        <div class="flex space-x-2 justify-end text-xs">
                                            <a href="{{ route('author.manuscripts.edit', $manuscript->id) }}"
                                                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md">
                                                Edit</a>

                                            <a href="{{ route('author.manuscripts.view', $manuscript->id) }}"
                                                class="px-4 py-2 bg-yellow-700 hover:bg-yellow-600 text-white rounded-md">
                                                View</a>

                                            <a href="{{ route('author.manuscripts.download', $manuscript->file) }}"
                                                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md">
                                                Download</a>

                                                <form action="{{ route('author.manuscripts.destroy', $manuscript->id) }}" method="POST"
                                                    onsubmit="return confirm('Withdraw Submission? Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-4 py-2 bg-yellow-700 hover:bg-yellow-600 text-white rounded-md">
                                                        Withdraw
                                                    </button>
                                                </form>

                                                <!-- Modal Button #2 -->
                                                <div class="d-grid gap-2 d-md-flex justify-content-end">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                        <i class=" text-green-600 hover:text-green-700 fa-solid fa-layer-group fa-bounce"></i>
                                                    </button>
                                                  </div>

                                        </div>
                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p>
                                                <span>{{ $manuscript->manu_title }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <div>
                                        <p class="flex text-md text-gray-500"> Description/Cover Letter </p>


                                        <!-- Modal Button -->
                                        <div class="d-grid gap-2 d-md-flex justify-content-end">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="text-blue-600 hover:text-blue-700 fa-solid fa-thumbtack fa-shake"></i>
                                            </button>
                                          </div>

                                        @if (Auth::user()->id == $manuscript->user_id)
                                        <br><span class="flex text-sm text-gray-500">{{ $manuscript->cover_letter }}</span>
                                        <br>
                                        <p class="flex text-md text-gray-500 flex justify-end pb-3 pt-4"> Attached Document</p>
                                        <span class="flex text-sm text-blue-600 hover:text-blue-700 justify-end items-center">
                                            <i class="fa-solid fa-file-pdf text-xl"></i>{{ $manuscript->file }}</span>
                                       </div>
                                    </div>
                                  </div>
                                    <br><br>
                                    <hr class="text-red-800">
                                    <br><br>
                                  <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Corresponding Author</h1>
                                            <button type="button" data-bs-dismiss="modal">
                                                <i class="text-red-600 text-xl hover:text-red-700 fa-regular fa-circle-xmark"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <p class="flex text-lg text-gray-600"> Name: <br>
                                                        {{ $manuscript->au_fname }} {{ $manuscript->au_lname }}</p><br>
                                                        <span class="text-xl text-blue-600 uppercase items-center"> Email: <br>
                                                        {{ $manuscript->au_email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        @endif
                                  @endforeach
            </div>
        </div>
    </div>
<!-- Modal #2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Co-Authors</h1>
        <button type="button" data-bs-dismiss="modal">
            <i class="text-red-600 text-xl hover:text-red-700 fa-regular fa-circle-xmark"></i></button>
        </div>
        <div class="modal-body">
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
                    </tr>

                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

</x-author-layout>
