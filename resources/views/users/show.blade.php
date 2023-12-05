<x-layout-login>
    <a href="{{ route('users.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="text-center text-2xl font-bold">History</h1>
    @auth
        <div class="mb-4">
            <p><span class="text-lg font-Bold">Employee:</span> {{ $user->name . ' ' . $user->last_name }}</p>
        </div>
        @if ($records->count() == 0)
            <p class="text-center text-2xl font-bold">No records found</p>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-center text-gray-700 border-gray-500">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            {{-- <th scope="col" class="px-6 py-3">Deparment</th>
                        <th scope="col" class="px-6 py-3">Total Access</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr class="odd:bg-white even:bg-gray-200  border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $record->id }}</th>
                                <td class="px-6 py-4">{{ $record->status }}</td>
                                <td class="px-6 py-4">{{ $record->created_at }}</td>

                                {{-- <td class="px-6 py-4">{{ $user->department->name }}</td>
                            <td class="px-6 py-4">Total Access</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endauth
</x-layout-login>
