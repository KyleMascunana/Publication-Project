<x-chief-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Reviewer Submission Panel</span>
                <div class="flex p-3">
                    <a href="{{ route('chief.reviewers.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Go back</a>
                </div><br><br>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form action="{{ route('chief.reviewers.store') }}" method="post"
                                    class="row g-3" enctype="multipart/form-data">
                                       @csrf

                                       <!-- Author Information -->
                                        <div class="col-md-8">
                                            <label for="inputLastname" class="form-label px-6 pt-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Information(s)</label>
                                            <select name="rev_id" class="form-select border rounded selectpicker">
                                                <option class="text-center" selected> -- Reviewer Information(s) --</option>
                                                @foreach ($reviewers as $rev)
                                                    <option class="text-center" value="{{ $rev->id }}">
                                                        {{ $rev->id }} - {{ $rev->rev_fname }} {{ $rev->rev_lname }} ( {{ $rev->rev_email }} )</option>
                                                @endforeach
                                            </select>
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
                                        </div> <hr>

                                        <div class="col-md-12">
                                            <label for="inputAffiliation" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Add Description or Comment</label>
                                            <textarea class="form-control  border rounded" name="description"
                                                 id="exampleFormControlTextarea1" rows="3"></textarea>
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

</x-chief-layout>
