<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg lg:rounded-lg p-2">
                <span class="text-xl px-4 py-2">Role Panel</span>
                <div class="flex p-3">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-4">Back to Role</a>
                </div><br><br>
                <div class="flex flex-col p-2 bg-slate-100 rounded-md">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf

                            @method('PUT')
                          <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Role Name </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="name" value="{{ $role->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                            </div>
                            @error('name') <span class="text--500 text-sm">{{ $message }}</span>@enderror
                          </div><br>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white rounded-md p-5">Update</button>
                          </div>
                        </form>
                      </div>
                </div> <br>
                <hr class="border border-solid">
                <div class="mt-6 p-2  bg-slate-100 rounded-md">
                    <h2 class="text-2xl font-semibold">Role Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                                <form action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-700
                                    text-white rounded-md">{{ $role_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>

                    <div class="max-w-lg mt-6">
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
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
    </div>
</x-admin-layout>
