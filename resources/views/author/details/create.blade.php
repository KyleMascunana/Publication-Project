<x-author-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto md:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Author Profile Panel</span>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form action="{{ route('author.details.store') }}" method="post"
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

                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6">
                                              <div class="md:col-span-3">
                                                <label for="au_fname" class="block text-md font-medium leading-6 text-gray-900">First name</label>
                                                <div class="mt-2">
                                                  <input type="text" name="au_fname" id="au_fname" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                                </div>
                                              </div>

                                              <div class="md:col-span-3">
                                                <label for="au_lname" class="block text-md font-medium leading-6 text-gray-900">Last name</label>
                                                <div class="mt-2">
                                                  <input type="text" name="au_lname" id="au_lname" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                                </div>
                                              </div>

                                              <div class="md:col-span-4">
                                                <label for="au_email" class="block text-md font-medium leading-6 text-gray-900">Email address</label>
                                                <div class="mt-2">
                                                  <input id="au_email" name="au_email" type="au_email" autocomplete="au_email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                                </div>
                                              </div>

                                              <div class="col-span-full">
                                                <label for="au_address" class="block text-md font-medium leading-6 text-gray-900">Street address</label>
                                                <div class="mt-2">
                                                  <input type="text" name="au_address" id="au_address" autocomplete="au_address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                                </div>
                                              </div>

                                              <div class="col-span-full">
                                                <label for="au_affiliation" class="block text-md font-medium leading-6 text-gray-900">Affiliation</label>
                                                <div class="mt-2">
                                                  <input type="text" name="au_affiliation" id="au_affiliation" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                                </div>
                                              </div>

                                            </div>
                                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                                <a href="{{ route('author.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
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

</x-author-layout>
