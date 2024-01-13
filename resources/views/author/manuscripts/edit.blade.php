<x-author-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Manuscript Submission Panel</span>
                <div class="flex justify-end p-3">
                    <a href="{{ route('author.manuscripts.index') }}"
                    class="px-4 py-2 bg-red-700 hover:bg-red-500 text-white rounded-md">
                    <i class="fa-solid fa-x"></i></a>
                </div>
                <div class="flex flex-col p-2 rounded-md">

                        <form method="POST" action="{{ route('author.manuscripts.update', $manuscript->id) }}"
                             enctype="multipart/form-data">
                            @csrf

                            @method('PUT')

                            @if (Auth::user()->id == $manuscript->user_id)


                            <div class="col-md-12">
                                <label> Add Cover Letter   | ID No.({{ $manuscript->id }})</label>
                                    <textarea class="form-control border rounded"
                                    name="cover_letter" id="cover_letter" rows="3" placeholder="{{ $manuscript->cover_letter }}" value="{{ $manuscript->cover_letter }}" required></textarea>

                                    <span class="text-red-500">
                                        @error('cover_letter'){{ $message }}@enderror
                                    </span>
                            </div><br>
                              <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Manuscript Type   | ID No.({{ $manuscript->id }})</label>
                                <select name="manu_type" id="manu_type" class="form-select py-2 rounded" value="{{ $manuscript->manu_type }}" required>
                                    <option class="text-center" value="Research Articles">Research Articles</option>
                                    <option class="text-center" value="Case Studies">Case Studies</option>
                                    <option class="text-center" value="Reflective Essays">Reflective Essays</option>
                                    <option class="text-center" value="Review Articles">Review Articles</option>
                                    <option class="text-center" value="Research Briefs">Research Briefs</option>
                                    <option class="text-center" value="Book Reviews">Book Reviews</option>
                                    <option class="text-center" value="Commentaries">Commentaries</option>
                                    <option class="text-center" value="Reactions">Reactions</option>
                                </select>
                            </div><br>
                              <div class="col-6">
                                <label for="inputAddress" class="form-label">Manuscript Title   | ID No.({{ $manuscript->id }})</label>
                                <input type="text" name="manu_title" id="manu_title" placeholder="Enter Manuscript Title"
                                class="form-control rounded" value="{{ $manuscript->manu_title }}" required>
                              </div><br>
                              <div class="col-6">
                                <label for="inputAddress2" class="form-label">File Type   | ID No.({{ $manuscript->id }})</label>
                                <select name="manu_file_type" id="manu_file_type" class="form-select py-2 rounded" value="{{ $manuscript->manu_file_type }}" required>
                                    <option class="text-center" value="Manuscript">Manuscript</option>
                                </select>
                              </div> <br>
                          <div class="col-md-12">
                            <label> Add Abstract   | ID No.({{ $manuscript->id }})</label>
                            <textarea class="form-control border rounded" name="manu_abstract" rows="3"
                            placeholder="{{ $manuscript->manu_abstract }}" value="{{ $manuscript->manu_abstract }}" required></textarea>
                        <span class="text-red-500">
                            @error('manu_abstract'){{ $message }}@enderror
                        </span>
                        </div>
                          <br>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Update</button>
                          </div> <br><br> <hr>
                          @error('manu_type') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          @error('manu_title') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          @error('manu_file_type') <span class="text--500 text-sm">{{ $message }}</span>@enderror

                            @endif

                        </form>
                </div>
            </div>
        </div>
    </div>
</x-author-layout>
