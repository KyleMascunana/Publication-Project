<div>


    <form wire:submit.prevent="manuscript">

        @if ($currentStep == 1)

        <div class="step-one">
            <div class="card">
                <div class="card-header bg-gray-500 text-white">STEP 1/4 - Manuscript Type</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Author's Firstname</label>
                                <input type="text" class="form-control border rounded"
                                wire:model="au_fname" placeholder="Enter Firstname">
                                <span class="text-red-500">
                                    @error('au_fname'){{ $message }}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Author's Lastname</label>
                                <input type="text" class="form-control border rounded"
                                wire:model="au_lname" placeholder="Enter Lirstname">
                                <span class="text-red-500">
                                    @error('au_lname'){{ $message }}@enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Author's Affiliation</label>
                                <input type="text" class="form-control border rounded"
                                wire:model="au_affiliation" placeholder="Enter Affiliation">
                                <span class="text-red-500">
                                    @error('au_affiliation'){{ $message }}@enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        @if ($currentStep == 2)

        <div class="step-two">
            <div class="card">
                <div class="card-header bg-gray-500 text-white">STEP 2/4 - Manuscript Title</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Add Cover Leter</label>
                                    <textarea class="form-control border rounded" id="task-textarea"  wire:model="cover_letter" placeholder="Add your Cover Letter here..." rows="3"></textarea>

                                    <span class="text-red-500">
                                        @error('cover_letter'){{ $message }}@enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        @endif

        @if ($currentStep == 3)

        <div class="step-three">
            <div class="card">
                <div class="card-header bg-gray-500 text-white">STEP 3/4 - Manuscript File Type</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Manuscript Type</label>
                                    <select wire:model="manu_type" class="form-select py-2 border-1 rounded" required>
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

                                    <span class="text-red-500">
                                        @error('manu_type'){{ $message }}@enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Manuscript Title</label>
                                        <input type="text" wire:model="manu_title" placeholder="Enter Manuscript Title"
                                        class="form-control border-1 rounded" required>


                                        <span class="text-red-500">
                                            @error('manu_title'){{ $message }}@enderror
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Manuscript File Type</label>
                                    <select wire:model="manu_file_type" class="form-select border-1 py-2 rounded" required>
                                        <option class="text-center" selected>-- Select File Type --</option>
                                        <option class="text-center" value="Manuscript">Manuscript</option>
                                    </select>
                                    <span class="text-red-500">
                                        @error('manu_file_type'){{ $message }}@enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        @endif

        @if ($currentStep == 4)

        <div class="step-four">
            <div class="card">
                <div class="card-header bg-gray-500 text-white">STEP 4/4 - File Upload</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">File Upload</label>
                                    <input type="file" wire:model="file" class="form-control py-2 border-1 rounded">
                                    @error('file'){{ $message }}@enderror
                                    <br>
                                        <label> Add Abstract</label>
                                        <textarea class="form-control border rounded" wire:model="manu_abstract" placeholder="Add your Abstract here..." rows="3"></textarea>
                                    <span class="text-red-500">
                                        @error('manu_abstract'){{ $message }}@enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        @endif


        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
            <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-md bg-red-500 hover:bg-red-700 text-white"
                wire:click="decreaseStep()">Back</button>
            @endif

            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
            <button type="button" class="btn btn-md bg-green-500 hover:bg-green-700 text-white"
            wire:click="increaseStep()">Next</button>
            @endif

            @if ($currentStep == 4)
            <button type="submit"  class="btn btn-md bg-blue-500 hover:bg-blue-700 text-white">Submit</button>
            @endif

        </div>

    </form>




</div>
