<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Submission Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('author.details.index') }}"
                    class="px-4 py-2 bg-red-700 hover:bg-red-500 text-white rounded-md">
                    <i class="fa-solid fa-x"></i></a>
                </div>
                <div class="flex flex-col p-2 rounded-md">

                        <form method="POST" action="{{ route('author.details.update', $author->id) }}"
                             enctype="multipart/form-data">
                            @csrf

                            @method('PUT')

                            @if (Auth::user()->id == $author->user_id)


                            <div class="col-md-12">
                                <label> Author Firstname</label>
                                <div class="col-6">
                                    <input type="text" name="au_fname" id="au_fname"
                                    class="form-control rounded" value="{{ $author->au_fname }}" required>
                                  </div><br>

                                  <label> Author Lastname</label>
                                <div class="col-6">
                                    <input type="text" name="au_lname" id="au_lname"
                                    class="form-control rounded" value="{{ $author->au_lname }}" required>
                                  </div><br>

                                  <label> Author Address</label>
                                <div class="col-6">
                                    <input type="text" name="au_address" id="au_address"
                                    class="form-control rounded" value="{{ $author->au_address }}" required>
                                  </div><br>

                                  <label> Author Affiliation</label>
                                <div class="col-6">
                                    <input type="text" name="au_affiliation" id="au_affiliation"
                                    class="form-control rounded" value="{{ $author->au_affiliation }}" required>
                                  </div><br>

                                  <div class="sm:col-span-6 pt-5">
                                    <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Update</button>
                                  </div> <br><br> <hr>

                                  @error('au_fname') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                                  @error('au_lname') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                                  @error('au_address') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                                  @error('au_affiliation') <span class="text--500 text-sm">{{ $message }}</span>@enderror

                            @endif

                        </form>
                </div>
            </div>
        </div>
    </div>
</x-author-layout>
