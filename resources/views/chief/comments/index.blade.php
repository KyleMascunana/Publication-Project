<x-chief-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($comments as $comment)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-xs space-x-5 flex">
                                             <p><i class="fa-solid fa-cloud fa-beat pr-2"></i>Manuscript Status: <span class="pl-2">{{ $comment->com_status }}</span> </p>
                                        </div>


                                        <div class="flex space-x-5 justify-end text-xs">
                                            <a href="{{ route('chief.comments.create') }}"
                                            class="px-4 py-2 bg-blue-700 hover:bg-blue-500 text-white rounded-md">
                                                Add Comment</a>

                                                <a href="{{ route('chief.comments.view', $comment->id) }}"
                                                    class="px-4 py-2 bg-yellow-700 hover:bg-yellow-600 text-white rounded-md">View</a>

                                                <a href="{{ route('chief.comments.downloadz', $comment->file) }}"
                                                    class="px-4 py-2 bg-gray-800 hover:bg-gray-600 text-white rounded-md">Download</a>

                                        </div>
                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p class=" text-xs flex text-gray-500">Reviewer's Name: </p>
                                            <p>
                                                <span>    {{ $comment->com_rev_fname }} {{ $comment->com_rev_lname }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <div>

                                            <p class="flex text-md text-gray-500 pb-3">Comment / Description</p>
                                            <span class="flex text-sm text-gray-500">{{ $comment->com_comment }}</span>


                                            <p class="flex text-md text-gray-500 flex justify-end pb-3 pt-4"> Attached Document</p>
                                        <span class="flex text-sm text-blue-600 hover:text-blue-700 justify-end items-center">
                                            <br>
                                            <i class="fa-solid fa-file-pdf text-xl"></i>{{ $comment->file }}</span>
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
