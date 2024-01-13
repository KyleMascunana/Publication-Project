<x-chief-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("Editor in Chief Content") }}


                    <div class="row p-4">
                        <div class="col-md-3">
                            <div class="card card-body bg-blue-500 text-white mb-3 items-center">
                                <label>Submitted Manuscripts</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalManuscripts }}</p>
                                <br>
                                <a href="{{ route('chief.manuscripts.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body bg-gray-500 text-white mb-3 items-center">
                                <label>Total Reviewer Assigned</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalreviewerassigned }}</p>
                                <br>
                                <a href="{{ route('chief.reviewerassigned.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-body bg-indigo-500 text-white mb-3 items-center">
                                <label>Total Reviewers</label>
                                <hr><br>
                                <p class="h1 text-white">{{ $totalReviewers }}</p>
                                <br>
                                <a href="{{ route('chief.reviewers.index') }}" class="text-white">View</a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</x-chief-layout>
