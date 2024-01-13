<x-reviewer-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Comments Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('reviewer.comments.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md"><i class="fa-solid fa-arrow-left text-white"></i>    Go back</a>
                </div>

                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form  method="POST" action="{{ route('reviewer.comments.store') }}" class="row g-3" enctype="multipart/form-data">
                            @csrf


                            <div class="col-md-8">
                                <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reviewer Information(s)</label>
                                <select name="rev_id" class="form-select border rounded selectpicker">
                                    <option class="text-center" selected> -- Reviewer Information(s) --</option>
                                    @foreach ($reviewers as $reviewers)
                                        @if (Auth::user()->id == $reviewers->user_id)
                                        <option class="text-center" value="{{ $reviewers->id }}">
                                            {{ $reviewers->id }} - {{ $reviewers->rev_fname }} {{ $reviewers->rev_lname }} ( {{ $reviewers->rev_email }} )</option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">( Just copy the name you choose in the select box. )</p>
                                <label for="com_rev_fname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reviewer Firstname </label>
                                <input type="text" id="com_rev_fname" name="com_rev_fname" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />

                              <label for="com_rev_lname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reviewer Lastname </label>
                                <input type="text" id="com_rev_lname" name="com_rev_lname" class="block w-full appearance-none bg-white border
                              border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition
                              duration-150 ease-in-out sm:text-sm sm:leading-5 " />
                            </div> <hr>

                            <div class="col-md-12">
                                <label for="inputAffiliation" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Add Description or Comment</label>
                                <textarea class="form-control  border rounded" name="com_comment"
                                     id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div> <hr>

                              <div class="col-md-8">
                                <label for="inputFirstname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Status</label>
                                <select name="com_status" class="form-select border rounded">
                                    <option class="text-center" selected> -- Select Status for Manuscript --</option>
                                    <option class="text-center" value="Reviewed with Comments">Reviewed with Comments</option>
                                    <option class="text-center" value="Minor Revision">Minor Revision</option>
                                    <option class="text-center" value="Major Revision">Major Revision</option>
                                    <option class="text-center" value="Accepted">Accepted</option>
                                    <option class="text-center" value="Rejected">Rejected</option>
                                </select>
                              </div> <hr>

                              <div class="col-md-6">
                                <label for="inputCity" class="form-label">File Upload</label>
                                <input type="file" name="file" class="form-control py-2 border-1 rounded">
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
</x-reviewer-layout>
