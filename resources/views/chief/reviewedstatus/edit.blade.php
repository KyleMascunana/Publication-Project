<x-chief-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Submission Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('chief.reviewedstatus.index') }}"
                    class="px-4 py-2 bg-red-700 hover:bg-red-500 text-white rounded-md">
                    <i class="fa-solid fa-x"></i></a>
                </div><br>
                <div class="flex flex-col p-2 rounded-md">

                        <form method="POST" action="{{ route('chief.reviewedstatus.update', $reviewedstatus->id) }}">
                            @csrf

                            @method('PUT')

                            <div class="col-md-8">
                                <label for="inputFirstname" class="form-label px-6 pt-3 text-left text-xs font-medium
                                text-gray-500 uppercase tracking-wider">Manuscript Status  | ID No.({{ $reviewedstatus->id }})</label>
                                <select name="rev_stat_status" value="{{ $reviewedstatus->rev_stat_status }}" class="form-select border rounded">
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

                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Update</button>
                          </div> <br><br> <hr>
                          @error('rev_stat_status') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-chief-layout>
