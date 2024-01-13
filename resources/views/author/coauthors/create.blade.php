<x-author-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Co-Author Panel</span>
                <div class="flex p-3">
                    <a href="{{ route('author.coauthors.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to Co-Authors</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 mt-10">
                        <form action="{{ route('author.coauthors.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                                       @csrf

                                       <h1 class="text-xl text-gray-800 dark:text-gray-200 leading-tight py-3 ml-3">
                                           {{ __('Fill Up Informations') }}
                                       </h1>

                                       <div class="col-md-6">
                                        <label for="inputLastname" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author ID</label>
                                        <select name="au_id" class="form-select border rounded " id="manuscript_id">
                                            @foreach ($authors as $au)
                                            @if (Auth::user()->id == $au->user_id)
                                                <option class="text-center" value="{{ $au->id }}"> {{ $au->id }} - {{ $au->au_fname }} {{ $au->au_lname }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                         </div>
                                         <div class="col-md-6">
                                           <label for="inputLastname" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript ID</label>
                                           <select name="manu_id" class="form-select border rounded" id="manuscript_id">
                                            @foreach ($manuscripts as $m)
                                            @if (Auth::user()->id == $m->user_id)
                                                <option class="text-center" value="{{ $m->id }}">{{ $m->id }} - {{ $m->manuscript_id }} - {{ $m->manu_title }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                         </div>
                                       <div class="col-md-6">
                                           <label for="inputEmail" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Manuscript Code</label>
                                           <select name="manuscript_id" class="form-select border rounded" id="manuscript_id">
                                            @foreach ($manuscripts as $manu)
                                            @if (Auth::user()->id == $manu->user_id)
                                                <option class="text-center" value="{{ $manu->manuscript_id }}"> {{ $manu->manuscript_id }} - {{ $manu->manu_title }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                         </div>
                                         <div class="col-md-12">
                                           <label for="inputAffiliation" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Author's Lastnames</label>
                                           <textarea class="form-control  border rounded" name="au_manu_Lname"
                                                id="exampleFormControlTextarea1" placeholder="Ex. R.Mabilin, L.Branzuela..." rows="3"></textarea>
                                         </div>
                                         <div class="col-md-12">
                                            <label for="inputAffiliation" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Author's Emails</label>
                                            <textarea class="form-control  border rounded" name="au_manu_email"
                                                id="exampleFormControlTextarea1" placeholder="Ex. author@author.com, author2@author.com..." rows="3"></textarea>
                                          </div>
                                          <div class="col-md-12">
                                            <label for="inputAffiliation" class="form-label px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Author Affiliations</label>
                                            <textarea class="form-control  border rounded" name="au_manu_affiliation"
                                                id="exampleFormControlTextarea1" placeholder="Ex. Professor, Professor..." rows="3"></textarea>
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

</x-author-layout>
