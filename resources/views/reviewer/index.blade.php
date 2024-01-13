<x-reviewer-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("Reviewer Content") }}

                    <div class="flex justify-end p-3">
                        <a href="{{ route('reviewer.details.create') }}" class="px-4 py-2 bg-blue-700 hover:bg-blue-500 text-white rounded-md">Add Profile!</a>
                    </div>

                    @foreach ($reviewers as $reviewer)
                    @if (Auth::user()->id == $reviewer->user_id)
                    <div class="row p-4">
                        <div class="col-md-3">
                            <div class="card card-body bg-blue-500 text-white mb-3 items-center">
                                <label>Manuscripts w/ Comments</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalComments }}</p>
                                <br>
                                <a href="{{ route('reviewer.comments.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body bg-gray-500 text-white mb-3 items-center">
                                <label>Manuscript Sent</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalManuscriptSent }}</p>
                                <br>
                                <a href="{{ route('reviewer.reviewermanuscripts.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endforeach
            </div>
        </div>
    </div>
</x-reviewer-layout>
