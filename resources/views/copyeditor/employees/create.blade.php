<x-copy-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">User Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('copyeditor.employees.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('copyeditor.employees.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12 pl-4">
                                <label for="inputCity" class="form-label block text-sm font-medium text-gray-700">Profile Picture</label>
                                <input type="file" name="file" class="form-control py-2 border-1 rounded block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                              </div>
                          <div class="pl-4">
                            <label for="emp_username" class="block text-sm font-medium text-gray-700">Username </label>
                            <div class="mt-1 col">
                              <input type="text" id="emp_username" name="emp_username" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <label for="emp_email" class="block text-sm font-medium text-gray-700">Employee Email </label>
                            <div class="mt-1 col">
                              <input type="emp_email" id="emp_email" name="emp_email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <label for="emp_fname" class="block text-sm font-medium text-gray-700">Employee Firstname </label>
                            <div class="mt-1">
                              <input type="emp_fname" id="emp_fname" name="emp_fname" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <label for="emp_lname" class="block text-sm font-medium text-gray-700">Employee Lastname</label>
                            <div class="mt-1">
                              <input type="emp_lname" id="emp_lname" name="emp_lname" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <div class="mt-4">
                                <x-input-label for="emp_role" value="{{ __('Register as:') }}"/>
                                <select name="emp_role" class="block mt-1 w-full border-gray-300 focus:border-indigo-300
                                focus:ring focus:ring-indogo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="Copy Editor">Copy Editor</option>
                                </select>
                            </div><br>
                            <label for="emp_affiliation" class="block text-sm font-medium text-gray-700">Employee Affiliation</label>
                            <div class="mt-1">
                              <input type="emp_affiliation" id="emp_affiliation" name="emp_affiliation" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <label for="emp_address" class="block text-sm font-medium text-gray-700">Employee Address</label>
                            <div class="mt-1">
                              <input type="emp_address" id="emp_address" name="emp_address" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div><br>
                            <label for="emp_contact" class="block text-sm font-medium text-gray-700">Employee Contact Number</label>
                            <div class="mt-1">
                              <input type="emp_contact" id="emp_contact" name="emp_contact" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>

                            @error('name') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          </div><br>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Create Employee</button>
                          </div>
                        </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-copy-layout>
