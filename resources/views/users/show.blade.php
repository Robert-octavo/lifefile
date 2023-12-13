<x-layout-login>
    <a href="{{ route('users.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="text-center text-2xl font-bold">History</h1>

    {{-- If the user is logged in --}}
    @auth
        <div class="mb-4 flex justify-between items-center">
            <p><span class="text-lg font-Bold">Employee:</span> {{ $user->name . ' ' . $user->last_name }}</p>
            <a href="{{ route('generate-pdf', $user) }}"
                class="inline-flex items-center px-5 py-2.5 mb-4 text-sm font-semibold text-center text-black bg-yellow-200 rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-300 ">
                <svg class="w-3.5 h-3.5 ms-1 mx-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 3V16M12 16L16 11.625M12 16L8 11.625" stroke="#1C274C" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M15 21H9C6.17157 21 4.75736 21 3.87868 20.1213C3 19.2426 3 17.8284 3 15M21 15C21 17.8284 21 19.2426 20.1213 20.1213C19.8215 20.4211 19.4594 20.6186 19 20.7487"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                Download History
            </a>
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

    {{-- If the user is not logged in --}}
    @guest
        <h2 class="text-center text-2xl font-bold">You do not habe access to this view</h2>
    @endguest
</x-layout-login>
