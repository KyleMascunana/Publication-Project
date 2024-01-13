<x-chief-layout>


    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($reviewedstatuses as $reviewedstatus)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                             <p><i class="fa-solid fa-cloud fa-beat"></i> Status ID: <span class="pl-2">{{ $reviewedstatus->id }}</span> </p>
                                             <p>|</p>
                                            <p> <i class="fa-solid fa-bookmark fa-beat"></i><span class="pl-2">{{ $reviewedstatus->manuscript_id }}</span> </p>
                                        </div>


                                        <div class="flex space-x-5 justify-end text-xs">
                                            <a href="{{ route('chief.reviewedstatus.create') }}"
                                            class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md">Add for Review</a>

                                            <a href="{{ route('chief.reviewedstatus.edit', $reviewedstatus->id) }}"
                                                class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-md"> Edit</a>

                                        </div>
                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p class=" text-xs flex text-gray-500">Author's Name: </p>
                                            <p>
                                                <span>  {{ $reviewedstatus->au_fname }} {{ $reviewedstatus->au_lname }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <div>
                                        <p class="flex text-gray-500">Manuscript Status:
                                            <span class="pl-2 text-sm flex">( {{ $reviewedstatus->rev_stat_status }} )</span></p>
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
