<x-artist-layout>

                <div class="py-12 w-full">
                    <div class="max-w-7xl mx-auto md:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                            <span class="text-xl px-4 py-2">Author Profile Panel</span>
                            <div class="flex justify-end p-3">
                                <a href="{{ route('artist.employees.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to Users</a>
                            </div>
                            <div class="flex flex-col">
                                <div class="space-y-8 divide-y divide-gray-200 mt-10">

                        <form action="{{ route('artist.employees.store') }}" method="post"
                        class="row g-3" enctype="multipart/form-data">
                           @csrf

                           <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                            <p class="mt-1 text-md leading-6 text-gray-600">This information will be displayed
                                publicly so be careful what you share.</p>

                          <div class="col-span-full">
                            <label for="cover-photo" class="block text-md font-medium leading-6 text-gray-900">Cover photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                              <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-lg leading-6 text-gray-600">
                                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold
                                  ]text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600
                                  -within:ring-offset-2 hover:text-indigo-500">
                                    <input type="file" id="file" name="file" type="file" class="pl-12 ml-12">
                                  </label>
                                </div>
                                <p class="text-md leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                              </div>
                            </div> <br>

                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                                <p class="mt-1 text-md leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                                  <div class="md:col-span-3">
                                    <label for="emp_username" class="block text-md font-medium leading-6 text-gray-900">Username</label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_username" id="emp_username" autocomplete="given-name"
                                      class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset
                                      ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>

                                  <div class="md:col-span-3">
                                    <label for="emp_email" class="block text-md font-medium leading-6 text-gray-900">Email </label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_email" id="emp_email" autocomplete="family-name"
                                      class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>

                                  <div class="md:col-span-3">
                                    <label for="emp_fname" class="block text-md font-medium leading-6 text-gray-900"> Firstname</label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_fname" id="emp_fname" autocomplete="given-name" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                  </div><br>

                                  <div class="md:col-span-3">
                                    <label for="emp_lname" class="block text-md font-medium leading-6 text-gray-900">Lastname</label>
                                    <div class="mt-2">
                                      <input id="emp_lname" name="emp_lname" type="emp_lname" autocomplete="emp_lname" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>

                                  <div class="md:col-span-4">
                                    <x-input-label for="emp_role" value="{{ __('Register as:') }}"/>
                                    <select name="emp_role" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                        <option value="Layout Artst">Layout Artist</option>
                                    </select>
                                  </div><br>

                                  <div class="col-span-full">
                                    <label for="emp_address" class="block text-md font-medium leading-6 text-gray-900">Address</label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_address" id="emp_address" autocomplete="emp_address" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>

                                  <div class="col-span-full">
                                    <label for="emp_affiliation" class="block text-md font-medium leading-6 text-gray-900">Affiliation</label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_affiliation" id="emp_affiliation" autocomplete="address-level2" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>

                                  <div class="col-span-full">
                                    <label for="emp_contact" class="block text-md font-medium leading-6 text-gray-900">Contact</label>
                                    <div class="mt-2">
                                      <input type="text" name="emp_contact" id="emp_contact" autocomplete="address-level2" class="block w-50 rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                  </div><br>
                                  <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <a href="{{ route('artist.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                                    text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                  </div>

                         </form>
                      </div>

                </div>
            </div>
        </div>
    </div>
</x-artist-layout>
