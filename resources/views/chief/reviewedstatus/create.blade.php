<x-chief-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Reviewed Status Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('chief.reviewedstatus.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-arrow-left text-white"></i>    Go back</a>
                </div>

                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form  method="POST" action="{{ route('chief.reviewedstatus.store') }}" class="row g-3" enctype="multipart/form-data">
                            @csrf

                            <!-- Author Information -->
                            <div class="col-md-8">
                                <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Information(s)</label>
                                <select name="au_id" class="form-select border rounded selectpicker">
                                    <option class="text-center" selected> -- Author Information(s) --</option>
                                    @foreach ($authors as $au)
                                        <option class="text-center" value="{{ $au->id }}">
                                            {{ $au->id }} - {{ $au->au_fname }} {{ $au->au_lname }} ( {{ $au->au_email }} )</option>
                                    @endforeach
                                </select>
                                <p class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">( Just copy the name you choose in the select box. )</p>
                                <label for="au_fname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Firstname </label>
                                <input type="text" id="au_fname" name="au_fname" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />

                              <label for="au_lname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Lastname </label>
                                <input type="text" id="au_lname" name="au_lname" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />

                            </div> <hr>

                             <!-- Manuscript Information -->
                            <div class="col-md-8">
                                <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Information(s)</label>
                                <select name="manu_id" class="form-select border rounded selectpicker">
                                    <option class="text-center" selected> -- Manuscript Information(s) --</option>
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
                                    <option class="text-center" selected> -- User Information(s) --</option>
                                    @foreach ($users as $user)
                                    <option class="text-center" value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }} - {{ $user->email }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label for="inputFirstname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Status</label>
                                <select name="rev_stat_status" class="form-select border rounded">
                                    <option class="text-center" selected> -- Select Status for Manuscript --</option>
                                    <option class="text-center" value="Waiting for Reviewer">Waiting for Reviewer</option>
                                    <option class="text-center" value="Review Ongoing">Review Ongoing</option>
                                    <option class="text-center" value="Already Reviewed">Reviewed with Comments</option>
                                    <option class="text-center" value="Minor Revision">Minor Revision</option>
                                    <option class="text-center" value="Major Revision">Major Revision</option>
                                    <option class="text-center" value="Accepted">Accepted</option>
                                    <option class="text-center" value="Rejected">Rejected</option>
                                </select>
                              </div>

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
