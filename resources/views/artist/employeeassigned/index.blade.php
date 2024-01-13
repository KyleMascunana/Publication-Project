<x-artist-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($employeeassigned as $employeeassigned)
                            @if (Auth::user()->id == $employeeassigned->user_id)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                            <p><i class="fa-solid fa-users fa-beat pr-2"></i> <span class="pl-2">
                                                {{$employeeassigned->emp_username }}</span> </p>
                                                <p>|</p>
                                            <p><i class="fa-solid fa-user fa-beat pr-2"></i> <span class="pl-2">
                                                {{$employeeassigned->user_id }}</span> </p>
                                                <p>|</p>
                                            <p><i class="fa-solid fa-user fa-beat pr-2"></i>Manuscript ID: <span class="pl-2">
                                                {{$employeeassigned->manu_id }} - ( {{$employeeassigned->manuscript_id }} )</span> </p>
                                        </div>


                                        <div class="flex space-x-5 justify-end text-xs">
                                            <a href="{{ route('artist.employeeassigned.create') }}"
                                            class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md">
                                            Send back to Editor</a>

                                        </div>



                                        </div>
                                    <div class="card-body">
                                       <div>

                                            <p class="flex text-md text-gray-500 pb-3">Comment / Description</p>
                                            <span class="flex text-sm text-gray-500">{{$employeeassigned->description }}</span>


                                            <p class="flex text-md text-gray-500 flex justify-end pb-3 pt-4"> Attached Document</p>
                                        <span class="flex text-sm text-blue-600 hover:text-blue-700 justify-end items-center">
                                            <br>
                                            <i class="fa-solid fa-file-pdf text-xl"></i> {{$employeeassigned->file }}</span>
                                       </div>
                                    </div>
                                  </div>
                                    <br><br>
                                    <hr class="text-red-800">
                                    <br><br>
                                    @endif
                                  @endforeach
            </div>
        </div>
    </div>

</x-artist-layout>
