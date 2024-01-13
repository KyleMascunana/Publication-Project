<x-chief-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($acceptedmanuscripts as $acceptedmanuscript)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                             <p><i class="fa-solid fa-user fa-beat"></i><span class="pl-2"> {{ $acceptedmanuscript->emp_username }}</span> </p>
                                             <p>|</p>
                                             <p><i class="fa-solid fa-envelope fa-beat"></i><span class="pl-2"> {{ $acceptedmanuscript->emp_email }}</span> </p>
                                             <p>|</p>
                                             <p><i class="fa-solid fa-id-badge fa-beat"></i><span class="pl-2"> {{ $acceptedmanuscript->manuscript_id }}</span> </p>
                                        </div>


                                        <div class="flex space-x-5 justify-end text-xs">
                                            <a href="{{ route('chief.acceptedmanuscript.edit', $acceptedmanuscript->id) }}"
                                                class="px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white rounded-md"> Edit
                                            </a>

                                            <a href="{{ route('chief.acceptedmanuscript.show', $acceptedmanuscript->id) }}"
                                                class="px-4 py-2 bg-violet-500 hover:bg-violet-700 text-white rounded-md">View
                                            </a>

                                            <a href="{{ route('chief.acceptedmanuscript.downloads', $acceptedmanuscript->file) }}"
                                                class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-md">Download
                                            </a>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <div>

                                            <p class="flex text-md text-gray-500 pb-3">Manuscript Status</p>
                                            <span class="flex text-sm text-gray-500">{{ $acceptedmanuscript->rev_stat_status }}</span>


                                            <p class="flex text-md text-gray-500 flex justify-end pb-3 pt-4"> Attached Document</p>
                                        <span class="flex text-sm text-blue-600 hover:text-blue-700 justify-end items-center">
                                            <br>
                                            <i class="fa-solid fa-file-pdf text-xl"></i>{{ $acceptedmanuscript->file }}</span>
                                       </div>
                                    </div>
                                  </div>
                                    <br><br>
                                    <hr class="text-red-800">
                                    <br><br>
                                  @endforeach
            </div>
        </div>
    </div>
</x-chief-layout>
