<x-copy-layout>

    <div class="py-12 w-70">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                            @foreach ($employees as $employee)
                            @if (Auth::user()->id == $employee->user_id)
                                <div class="card text-center">
                                    <div class="card-header">

                                        <div class="text-gray-500 text-md space-x-5 flex">
                                            <p>
                                                <img src="{{ asset('profiles/'.$employee->file) }}" alt="file" width="150px"
                                                height="150px" class="rounded-5">
                                            </p>
                                            <div>
                                                <p class="flex text-lg text-gray-500 pb-3">Employee Information</p>
                                                <span class="flex text-md text-gray-500"> {{ $employee->emp_fname }} {{ $employee->emp_lname }}</span>

                                                <span class="flex text-md text-gray-500"> {{$employee->emp_email }}</span>

                                                <span class="flex text-md text-gray-500"> {{ $employee->emp_role }}</span>

                                                <span class="flex text-md text-gray-500"> {{ $employee->emp_contact }}</span>
                                           </div>

                                        </div>
                                        <div class="flex space-x-5 justify-end text-xs">
                                    </div>
                                    </div>
                                  </div>
                                    <br><br>
                                    @endif
                                  @endforeach
            </div>
        </div>
    </div>

</x-copy-layout>
