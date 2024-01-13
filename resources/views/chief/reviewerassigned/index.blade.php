<x-chief-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($reviewermanuscripts as $reviewermanuscript)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                            <p><i class="fa-solid fa-cloud fa-beat pr-2"></i>Manuscript Status: <span class="pl-2">
                                                 {{$reviewermanuscript->rev_id }}</span> </p>
                                                <p>|</p>
                                            <p><i class="fa-solid fa-user fa-beat pr-2"></i>User ID: <span class="pl-2">
                                                {{$reviewermanuscript->user_id }}</span> </p>
                                        </div>


                                        <div class="flex space-x-5 justify-end text-xs">
                                            <a href="{{ route('chief.reviewers.create') }}"
                                            class="px-3 py-2 bg-gray-700 hover:bg-green-gray text-white rounded-md">Manuscript to Reviewer</a>


                                        </div>
                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p class=" text-xs flex text-gray-500">Reviewed ID: </p>
                                            <p>
                                                <span>    {{ $reviewermanuscript->rev_id }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <div>

                                            <p class="flex text-md text-gray-500 pb-3">Comment / Description</p>
                                            <span class="flex text-sm text-gray-500">{{ $reviewermanuscript->description }}</span>


                                            <p class="flex text-md text-gray-500 flex justify-end pb-3 pt-4"> Attached Document</p>
                                        <span class="flex text-sm text-blue-600 hover:text-blue-700 justify-end items-center">
                                            <br>
                                            <i class="fa-solid fa-file-pdf text-xl"></i>{{ $reviewermanuscript->file }}</span>
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
