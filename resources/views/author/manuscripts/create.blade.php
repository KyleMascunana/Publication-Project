<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <div class="container">
                    <div class="row" style="mt-5">
                        <div class="col-md-12">

                            <form action="{{ route('author.manuscripts.store') }}" method="post" enctype="multipart/form-data">
                               @csrf

                               <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Manuscript Submission</h2>
                                <p class="mt-1 text-md leading-6 text-gray-600">Always re-check your information for clean submission.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6">
                                  <div class="md:col-span-3">
                                    <label for="au_fname" class="block text-md font-medium leading-6 text-gray-900">First name</label>
                                    <div class="mt-2">
                                      <input type="text" name="au_fname" id="au_fname" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                    <span class="text-red-500">
                                        @error('au_fname'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="md:col-span-3">
                                    <label for="au_lname" class="block text-md font-medium leading-6 text-gray-900">Last name</label>
                                    <div class="mt-2">
                                      <input type="text" name="au_lname" id="au_lname" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                    <span class="text-red-500">
                                        @error('au_lname'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="md:col-span-3">
                                    <label for="au_email" class="block text-md font-medium leading-6 text-gray-900">Email</label>
                                    <div class="mt-2">
                                      <input type="text" name="au_email" id="au_email" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                    <span class="text-red-500">
                                        @error('au_email'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="col-span-full">
                                    <label for="au_email" class="block text-md font-medium leading-6 text-gray-900">Cover Letter</label>
                                    <div class="mt-2">
                                        <textarea class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset
                                        ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                        md:text-md md:leading-6" id="cover_letter"  name="cover_letter"
                                        placeholder="Add your Cover Letter here..."></textarea>

                                    </div>
                                    <span class="text-red-500">
                                        @error('cover_letter'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="md:col-span-3">
                                    <label for="manu_type" class="block text-sm font-medium leading-6 text-gray-900">Manuscript Type</label>
                                    <div class="mt-2">
                                      <select id="manu_type" name="manu_type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                        <option class="text-center" selected>-- Select Type --</option>
                                        <option class="text-center" value="Research Articles">Research Articles</option>
                                        <option class="text-center" value="Case Studies">Case Studies</option>
                                        <option class="text-center" value="Reflective Essays">Reflective Essays</option>
                                        <option class="text-center" value="Review Articles">Review Articles</option>
                                        <option class="text-center" value="Research Briefs">Research Briefs</option>
                                        <option class="text-center" value="Book Reviews">Book Reviews</option>
                                        <option class="text-center" value="Commentaries">Commentaries</option>
                                        <option class="text-center" value="Reactions">Reactions</option>
                                      </select>
                                    </div>
                                    <span class="text-red-500">
                                        @error('manu_type'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="md:col-span-3">
                                    <label for="manu_title" class="block text-md font-medium leading-6 text-gray-900">Manuscript Title</label>
                                    <div class="mt-2">
                                      <input type="text" name="manu_title" id="manu_title" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                    </div>
                                    <span class="text-red-500">
                                        @error('manu_title'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="md:col-span-3">
                                    <label for="manu_file_type" class="block text-sm font-medium leading-6 text-gray-900">Manuscript Type</label>
                                    <div class="mt-2">
                                      <select id="manu_file_type" name="manu_file_type" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 md:text-md md:leading-6">
                                        <option class="text-center" selected>-- Select File Type --</option>
                                        <option class="text-center" value="Manuscript">Manuscript</option>
                                      </select>
                                    </div>
                                    <span class="text-red-500">
                                        @error('manu_file_type'){{ $message }}@enderror
                                    </span>
                                  </div>

                                  <div class="col-span-full">
                                    <label for="cover-photo" class="block text-md font-medium leading-6 text-gray-900">Upload File</label>
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
                                        <p class="text-md leading-5 text-gray-600">PDF, DOC, PPT, EXCEL ETC...</p>
                                      </div>

                                      @error('file'){{ $message }}@enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="manu_abstract" class="block text-md font-medium leading-6 text-gray-900">Abstract</label>
                                        <div class="mt-2">
                                            <textarea class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-md ring-1 ring-inset
                                            ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                            md:text-md md:leading-6" id="manu_abstract"  name="manu_abstract"
                                            placeholder="Add your Abstract here..."></textarea>

                                        </div>
                                        <span class="text-red-500">
                                            @error('v'){{ $message }}@enderror
                                        </span>
                                      </div>

                                      <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a href="{{ route('author.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                      </div>
                                </div>
                             </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-author-layout>
