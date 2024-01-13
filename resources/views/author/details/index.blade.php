<x-author-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($authors as $author)
                            @if (Auth::user()->id == $author->user_id)
                            <div class="card text-center">
                                <div class="card-header">

                                    <div class="text-gray-500 text-md space-x-5 flex">
                                        <p>
                                            <img src="{{ asset('profiles/'.$author->file) }}" alt="file" width="150px"
                                            height="150px" class="rounded-5">
                                        </p>
                                        <div>
                                            <p class="flex text-lg text-gray-500 pb-3">Author Information</p>
                                            <span class="flex text-md text-gray-500"> {{ $author->au_fname }} {{ $author->au_lname }}</span>

                                            <span class="flex text-md text-gray-500"> {{ $author->au_email }}</span>

                                            <span class="flex text-md text-gray-500"> {{  $author->au_affiliation  }}</span>

                                            <span class="flex text-md text-gray-500"> {{ $author->au_address }}</span>
                                       </div>

                                    </div>
                                    <div class="flex space-x-5 justify-end text-xs">

                                        <a href="{{ route('author.details.edit', $author->id) }}"
                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">
                                            <i class="fa-solid fa-file-pen"></i> Edit</a>

                                </div>
                                </div>
                              </div>
                                <br><br>
                                <hr>
                            @endif
                            @endforeach
            </div>
        </div>
    </div>
</x-author-layout>
