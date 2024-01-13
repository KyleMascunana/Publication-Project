<x-chief-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Accepted Manuscript Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('chief.acceptedmanuscript.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-arrow-left text-white"></i>    Go back</a>
                </div>

                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form  method="POST" action="{{ route('chief.acceptedmanuscript.store') }}" class="row g-3" enctype="multipart/form-data">
                            @csrf


                            <div class="col-md-8">
                                <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee Information(s)</label>
                                <select name="emp_id" class="form-select border rounded selectpicker">
                                    <option class="text-center" selected> -- Employee Information(s) --</option>
                                    @foreach ($employees as $employees)
                                        <option class="text-center" value="{{ $employees->id }}">
                                            {{ $employees->id }} - {{ $employees->emp_username }} - {{ $employees->emp_role }} - ({{ $employees->emp_email }})</option>
                                    @endforeach
                                </select>
                                <p class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">( Just copy the name you choose in the select box. )</p>
                                <label for="emp_username" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee Username </label>
                                <input type="text" id="emp_username" name="emp_username" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                              <label for="emp_email" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee Email </label>
                                <input type="email" id="emp_email" name="emp_email" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                            </div> <hr>

                            <!-- reviewer status Information -->
                            <div class="col-md-8">
                                <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Status Information(s)</label>
                                <select name="rev_stat_id" class="form-select border rounded selectpicker">
                                    <option class="text-center" selected> -- Manuscript Status Information(s) --</option>
                                    @foreach ($reviewedstatus as $reviewedstatus)
                                    <option class="text-center" value="{{ $reviewedstatus->id }}">{{ $reviewedstatus->id }} - {{ $reviewedstatus->manuscript_id }} - {{ $reviewedstatus->rev_stat_status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label for="inputFirstname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Status</label>
                                <select name="rev_stat_status" class="form-select border rounded">
                                    <option class="text-center" selected> -- Select Status for Manuscript --</option>
                                    <option class="text-center" value="Minor Revision">Minor Revision</option>
                                    <option class="text-center" value="Major Revision">Major Revision</option>
                                    <option class="text-center" value="Accepted">Accepted</option>
                                    <option class="text-center" value="Rejected">Rejected</option>
                                </select>
                              </div> <hr>

                           <!-- Manuscript Information -->
                           <div class="col-md-8">
                            <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Information(s)</label>
                            <select name="manu_id" class="form-select border rounded selectpicker">
                                <option class="text-center" selected> -- Assigned Manuscript Information(s) --</option>
                                @foreach ($manuscripts as $manu)
                                <option class="text-center" value="{{ $manu->id }}">{{ $manu->id }} - ( {{ $manu->manuscript_id }} ) - {{ $manu->manu_title }}</option>
                                @endforeach
                            </select>
                            <p class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">( Just copy the code you choose in the select box. )</p>

                            <label for="inputEmail" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Code</label>
                            <select name="manuscript_id" class="form-select border rounded" id="manuscript_id">
                             @foreach ($manuscripts as $manu)
                                 <option class="text-center" value="{{ $manu->manuscript_id }}"> {{ $manu->manuscript_id }} - {{ $manu->manu_title }}</option>
                             @endforeach
                            </select>
                        </div> <hr>

                        <!-- User(s) Information -->
                        <div class="col-md-8">
                            <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Information(s)</label>
                            <select name="user_id" class="form-select border rounded selectpicker">
                                <option class="text-center" selected> -- User (Manuscript Author) Information(s) --</option>
                                @foreach ($users as $user)
                                <option class="text-center" value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }} - {{ $user->email }} </option>
                                @endforeach
                            </select>
                        </div> <hr>

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
                        </div><br><br>




                            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5" type="submit" name="submit">Add Details</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-chief-layout>
