<x-author-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("Author Content") }}

                    <div class="flex justify-end p-3">
                        <a href="{{ route('author.details.create') }}" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 text-white rounded-md"> Click here to Start!</a>
                    </div>
                    <div class="row p-4">
                        <div class="col-md-3">
                            <div class="card card-body bg-blue-500 text-white mb-3 items-center">
                                <label>Submitted Manuscripts</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalManuscripts }}</p>
                                <br>
                                <a href="{{ route('author.manuscripts.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body bg-gray-500 text-white mb-3 items-center">
                                <label>Manuscript Status</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $manuscriptstatus }}</p>
                                <br>
                                <a href="{{ route('author.manustatus.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-author-layout>
