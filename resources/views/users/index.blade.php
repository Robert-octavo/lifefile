<x-layout>
    @auth
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-center text-gray-700 border-gray-500">
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">EmployerId</th>
                        <th scope="col" class="px-6 py-3">FirstName</th>
                        <th scope="col" class="px-6 py-3">LastNme</th>
                        <th scope="col" class="px-6 py-3">Deparment</th>
                        <th scope="col" class="px-6 py-3">Total Access</th>
                        <th scope="col" class="px-6 py-3">Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd:bg-white even:bg-gray-200  border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->id }}</th>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->last_name }}</td>
                            {{-- Display department name base in the $user_id --}}

                            <td class="px-6 py-4">{{ $user->department->name }}</td>
                            <td class="px-6 py-4">Total Access</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-evenly gap-2 w-full">
                                    {{-- Update Button --}}
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="inline-flex items-center pr-2 py-2.5 mb-4 text-xs font-semibold text-center text-white bg-gray-500 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            class="w-3.5 h-3.5 ms-2 mx-2" viewBox="0,0,256,256">
                                            <g fill="#FFFFFF" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                font-weight="none" font-size="none" text-anchor="none"
                                                style="mix-blend-mode: normal">
                                                <g transform="scale(8.53333,8.53333)">
                                                    <path
                                                        d="M15,3c-2.9686,0 -5.69718,1.08344 -7.79297,2.875c-0.28605,0.22772 -0.42503,0.59339 -0.36245,0.95363c0.06258,0.36023 0.31676,0.6576 0.66286,0.77549c0.3461,0.1179 0.72895,0.03753 0.99842,-0.20959c1.74821,-1.49444 4.01074,-2.39453 6.49414,-2.39453c5.19656,0 9.45099,3.93793 9.95117,9h-2.95117l4,6l4,-6h-3.05078c-0.51129,-6.14834 -5.67138,-11 -11.94922,-11zM4,10l-4,6h3.05078c0.51129,6.14834 5.67138,11 11.94922,11c2.9686,0 5.69718,-1.08344 7.79297,-2.875c0.28605,-0.22772 0.42504,-0.59339 0.36245,-0.95363c-0.06258,-0.36023 -0.31676,-0.6576 -0.66286,-0.7755c-0.3461,-0.1179 -0.72895,-0.03753 -0.99842,0.20959c-1.74821,1.49444 -4.01074,2.39453 -6.49414,2.39453c-5.19656,0 -9.45099,-3.93793 -9.95117,-9h2.95117z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                        Update
                                    </a>
                                    <p>text2</p>
                                    <p>text3</p>
                                    <p>text4</p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endauth
    @guest
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-center text-gray-700 border-gray-500">
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">EmployerId</th>
                        <th scope="col" class="px-6 py-3">FirstName</th>
                        <th scope="col" class="px-6 py-3">LastNme</th>
                        <th scope="col" class="px-6 py-3">Deparment</th>
                        <th scope="col" class="px-6 py-3">Total Access</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="odd:bg-white even:bg-gray-200  border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->id }}</th>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->last_name }}</td>
                            {{-- Display department name base in the $user_id --}}

                            <td class="px-6 py-4">{{ $user->department->name }}</td>
                            <td class="px-6 py-4">Total Access</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endguest
    <div class="my-4">
        {{ $users->links('pagination::simple-tailwind') }}
    </div>

</x-layout>
