<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Role Panel</span>
                <div class="flex p-3">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to User</a>
                </div><br><br>
                <div class="flex flex-col p-2 bg-slate-100 rounded-md">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                      <div>User Name : {{ $user->name }}</div>
                      <div>User Email : {{$user->email}}</div>
                      </div>
                </div> <br>
                <hr class="border border-solid">
                <div class="mt-6 p-2  bg-slate-100 rounded-md">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-4 p-2 bg-slate-100">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700
                                    text-white rounded-md">{{ $user_role->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="max-w-lg mt-6 bg-slate-100">
                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                            @csrf
                          <div class="sm:col-span-6">
                            <label for="role" class="block text-sm font-medium text-gray-700">Assign Roles</label>
                                <select id="role" name="role" autocomplete="role  -name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            @error('role') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          </div><br>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Assign</button>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2  bg-slate-100 rounded-md">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700
                                    text-white rounded-md">{{ $user_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="max-w-lg mt-6">
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                            @csrf
                          <div class="sm:col-span-6">
                            <label for="permission" class="block text-sm font-medium text-gray-700">Assign Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            @error('name') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          </div><br>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Assign</button>
                          </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</x-admin-layout>
