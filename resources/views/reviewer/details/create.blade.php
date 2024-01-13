<x-reviewer-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Reviewer Submission Panel</span>
                <div class="flex p-3">
                    <a href="{{ route('reviewer.details.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to Reviewer</a>
                </div><br><br>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form action="{{ route('reviewer.details.store') }}" method="post"
                                    class="row g-3" enctype="multipart/form-data">
                                       @csrf

                                       <h1 class="text-xl text-gray-800 dark:text-gray-200 leading-tight py-3 ml-3">
                                           {{ __('Fill Up Informations') }}
                                       </h1>
                                       <div class="col-md-12">
                                        <label for="inputCity" class="form-label">Profile Picture</label>
                                        <input type="file" name="file" class="form-control py-2 border-1 rounded">
                                      </div>
                                       <div class="col-md-6">
                                           <label for="inputFirstname" class="form-label">Firstname</label>
                                           <input type="text" placeholder="Enter Firstname" name="rev_fname" class="form-control border rounded" id="inputFirstname">
                                         </div>
                                         <div class="col-md-6">
                                           <label for="inputLastname" class="form-label">Lastname</label>
                                           <input type="text" placeholder="Enter Lastname"  name="rev_lname" class="form-control border rounded" id="inputLastname">
                                         </div>
                                       <div class="col-md-6">
                                           <label for="inputEmail" class="form-label">Email</label>
                                           <input type="email" placeholder="Enter Email"  name="rev_email" class="form-control border rounded" id="inputEmail">
                                         </div>
                                         <div class="col-md-6">
                                           <label for="inputAffiliation" class="form-label">Affiliation</label>
                                           <input type="text" placeholder="Enter Affiliation"  name="rev_affiliation" class="form-control border rounded" id="inputAffiliation">
                                         </div>
                                         <div class="col-12">
                                           <label for="inputAddress" class="form-label">Address</label>
                                           <input type="text"  name="rev_address" class="form-control border rounded" id="inputAddress" placeholder="1234 Main St">
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
