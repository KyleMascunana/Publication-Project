<x-chief-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex p-3">
                        <a href="{{ route('chief.comments.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Go back</a>
                    </div>

                            <h1>{{ $data->manu_title }}</h1>
                            <hr class="text-danger">
                            <small>Created at {{ $data->created_at }}</small>
                            <hr class="text-danger"><br>

                            <iframe height="1000"  width="1000" src="/comment_storages/{{$data->file}}"></iframe>






                </div>
            </div>
        </div>
    </div>








</x-chief-layout>
