<x-chief-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <div class="flex p-3 justify-end text-sm">
                    <a href="{{ route('chief.mail.index') }}"
                    class="px-4 py-2 bg-gray-700 hover:bg-gray-500 text-white rounded-md p-4">Invite Reviewer</a>
                </div>
                            @foreach ($reviewers as $reviewer)
                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p>
                                                <img src="{{ asset('profiles/'.$reviewer->file) }}" alt="file" width="150px"
                                                height="150px" class="rounded-5">
                                            </p>
                                            <div>
                                                <p class="flex text-lg text-gray-500 pb-3">Reviewer Information</p>
                                                <span class="flex text-md text-gray-500"> {{$reviewer->rev_fname }} {{$reviewer->rev_lname }}</span>

                                                <span class="flex text-md text-gray-500"> {{$reviewer->rev_email }}</span>

                                                <span class="flex text-md text-gray-500"> {{$reviewer->rev_affiliation }}</span>

                                                <span class="flex text-md text-gray-500"> {{$reviewer->rev_address }}</span>
                                           </div>

                                        </div>
                                        <div class="flex space-x-5 justify-end text-xs">
                                    </div>
                                    </div>
                                  </div>
                                    <br><br>
                                  @endforeach
            </div>
        </div>
    </div>
</x-chief-layout>
