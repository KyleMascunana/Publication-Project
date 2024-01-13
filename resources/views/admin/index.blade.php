<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("Admin Content") }}
                    <!-- Button trigger modal -->
                    <button type="button" class="h2 text-green-500 hover:text-green-700 float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-bell"></i>
                    </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-green-600" id="exampleModalLabel">
                                        <i class="fa-solid fa-bell"></i>  Notification Bar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-x text-red-500 hover:text-red-700"></i>
                                    </button>
                                  </div>
                                <div class="modal-body">
                                   <div>
                                    @if(auth()->user()->is_admin)
                                    @forelse($notifications as $notification)
                                        <div class="alert alert-success" role="alert">
                                            [{{ $notification->created_at }}]  <span class="float-right">User   {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered.</span>
                                        </div>
                                    @empty
                                       <p> There are no new notifications </p>
                                    @endforelse
                                @endif
                                   </div>


                                </div> <br>
                                <div class="modal-footer">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                <div class="row p-4">
                    <div class="col-md-3">
                        <div class="card card-body bg-blue-500 text-white mb-3 items-center">
                            <label>Author Active</label>
                            <hr><br>
                            <p class="h1 text-white">{{ $totalAuthors }}</p>
                            <br>
                            <a href="{{ route('admin.users.index') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-indigo-500 text-white mb-3 items-center">
                            <label>Numbers of Roles</label>
                            <hr><br>
                            <p class="h1 text-white">{{ $totalRoles }}</p>
                            <br>
                            <a href="{{ route('admin.roles.index') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-red-500 text-white mb-3 items-center">
                            <label>Numbers of Notifications</label>
                            <hr><br>
                            <p class="h1 text-white">{{ $totalnotifications }}</p>
                            <br>
                            <a href="{{ route('admin.activity.index') }}" class="text-white">View</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-green-500 text-white mb-3 items-center">
                            <label>Total User Accounts</label>
                            <hr><br>
                            <p class="h1 text-white">{{ $totalAllUsers }}</p>
                            <br>
                            <a href="{{ route('admin.users.index') }}" class="text-white">View</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>




@section('scripts')
@parent
@if(auth()->user()->is_admin)
    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('admin.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
    });
    </script>
@endif
@endsection
