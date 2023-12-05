<x-layout-login>
    <a href="{{ route('users.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="text-center text-2xl font-bold">Editar Employer</h1>

    <x-card class="container mx-auto mt-10 mb-10 max-w-lg">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name">Name:</label>
                <br>
                <input class="w-full" type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="last_name">Last Name:</label>
                <br>
                <input class="w-full" type="text" name="last_name" id="last_name"
                    value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between">
                <label for="access_room_911" class="inline-flex items-center">
                    <input type="checkbox" name="access_room_911" id="access_room_911"
                        class="rounded border-gray-300 mr-2">
                    <span class="text-slate-900">Access Room 911</span>
                </label>

                <label class="text-sm" for="department_id">Choose a department:

                    <select class="text-sm rounded-sm" name="department_id" id="department_id">
                        <option value="1">Accounting</option>
                        <option value="2">Administration</option>
                        <option value="3">Customer Service</option>
                        <option value="4">Engineering</option>
                        <option value="5">IT</option>
                    </select>
                </label>

            </div>
            <div class="flex gap-2 mt-4">
                <button type="submit"
                    class="rounded-md w-full px-2 py-1 text-center font-medium text-white bg-blue-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-blue-900">Update</button>
                {{-- <a href="#" class="btn mt-4 bg-gray-500/50">Go back to the tasks list</a> --}}
            </div>
        </form>
    </x-card>
</x-layout-login>
