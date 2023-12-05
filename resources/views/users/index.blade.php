<x-layout>
    @auth
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-center text-gray-700 border-gray-500">
                <thead class="text-xs text-white text-center uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">EmployerId</th>
                        <th scope="col" class="px-6 py-3">FirstName</th>
                        <th scope="col" class="px-6 py-3">Last Name</th>
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

                                    {{-- Disable - Enable --}}
                                    <form action="{{ route('users.toggle-access', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="inline-flex items-center pr-2 py-2.5 mb-4 text-xs font-semibold text-center text-white bg-gray-500 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">
                                            <svg class="w-3.5 h-3.5 ms-2 mx-2" viewBox="0 0 24 24" id="Layer_1"
                                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                                                <defs>
                                                    <style>
                                                        .cls-1 {
                                                            fill: none;
                                                            stroke: #ffffff;
                                                            stroke-miterlimit: 10;
                                                            stroke-width: 1.91px;
                                                        }
                                                    </style>
                                                </defs>
                                                <circle class="cls-1" cx="9.61" cy="5.8" r="4.3" />
                                                <path class="cls-1"
                                                    d="M1.5,19.64l.7-3.47a7.56,7.56,0,0,1,7.41-6.08,7.48,7.48,0,0,1,4.6,1.57" />
                                                <circle class="cls-1" cx="16.77" cy="16.77" r="5.73" />
                                                <polyline class="cls-1" points="19.64 14.86 16.3 18.2 14.39 16.3" />
                                            </svg>
                                            {{ $user->access_room_911 ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>

                                    {{-- History --}}
                                    <a href="#"
                                        class="inline-flex items-center pr-2 py-2.5 mb-4 text-xs font-semibold text-center text-black bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        <svg class="w-3.5 h-3.5 ms-2 mx-2" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M8 13H14M8 17H16M13 3H5V5M13 3H14L19 8V9M13 3V7C13 8 14 9 15 9H19M19 9V12M5 10V21H19V16"
                                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        History
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center pr-2 py-2.5 mb-4 text-xs font-semibold text-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                class="w-3.5 h-3.5 ms-2 mx-2" viewBox="0,0,256,256">
                                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                    font-weight="none" font-size="none" text-anchor="none"
                                                    style="mix-blend-mode: normal">
                                                    <g transform="scale(2.56,2.56)">
                                                        <path
                                                            d="M46,13c-1.64497,0 -3,1.35503 -3,3v2h-10.73437c-1.7547,0 -3.38611,0.92281 -4.28906,2.42773l-1.54297,2.57227h-3.43359c-2.19733,0 -4,1.80267 -4,4c0,2.19733 1.80267,4 4,4h1.07422l3.57422,46.45898c0.23929,3.11679 2.85609,5.54102 5.98242,5.54102h32.73828c3.12633,0 5.74313,-2.42423 5.98242,-5.54102l3.57422,-46.45898h1.07422c2.19733,0 4,-1.80267 4,-4c0,-2.19733 -1.80267,-4 -4,-4h-3.43359l-1.54297,-2.57227c-0.90296,-1.50492 -2.53436,-2.42773 -4.28906,-2.42773h-10.73437v-2c0,-1.64497 -1.35503,-3 -3,-3zM46,15h8c0.56503,0 1,0.43497 1,1v2h-10v-2c0,-0.56503 0.43497,-1 1,-1zM32.26563,20h11.56641c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.57617c1.0553,0 2.02922,0.55195 2.57227,1.45703l1.52734,2.54297h-3.33398c-0.18032,-0.00255 -0.34804,0.09219 -0.43894,0.24794c-0.0909,0.15575 -0.0909,0.34838 0,0.50413c0.0909,0.15575 0.25863,0.25049 0.43894,0.24794h5h3.5c1.11667,0 2,0.88333 2,2c0,1.11667 -0.88333,2 -2,2h-54c-1.11667,0 -2,-0.88333 -2,-2c0,-1.11667 0.88333,-2 2,-2h4h34.5c0.18032,0.00255 0.34804,-0.09219 0.43894,-0.24794c0.0909,-0.15575 0.0909,-0.34838 0,-0.50413c-0.0909,-0.15575 -0.25863,-0.25049 -0.43894,-0.24794h-33.33398l1.52734,-2.54297c0.54305,-0.90508 1.51697,-1.45703 2.57227,-1.45703zM64.5,24c-0.18032,-0.00255 -0.34804,0.09219 -0.43894,0.24794c-0.0909,0.15575 -0.0909,0.34838 0,0.50413c0.0909,0.15575 0.25863,0.25049 0.43894,0.24794h2c0.18032,0.00255 0.34804,-0.09219 0.43894,-0.24794c0.0909,-0.15575 0.0909,-0.34838 0,-0.50413c-0.0909,-0.15575 -0.25863,-0.25049 -0.43894,-0.24794zM26.07813,31h47.84375l-3.56445,46.30664c-0.16071,2.09321 -1.88861,3.69336 -3.98828,3.69336h-32.73828c-2.09967,0 -3.82757,-1.60015 -3.98828,-3.69336zM38,35c-1.65109,0 -3,1.34891 -3,3v35c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-35c0,-1.65109 -1.34891,-3 -3,-3zM50,35c-1.65109,0 -3,1.34891 -3,3v35c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-3.5c0.00255,-0.18032 -0.09219,-0.34804 -0.24794,-0.43894c-0.15575,-0.0909 -0.34838,-0.0909 -0.50413,0c-0.15575,0.0909 -0.25049,0.25863 -0.24794,0.43894v3.5c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-35c0,-1.11091 0.88909,-2 2,-2c1.11091,0 2,0.88909 2,2v25.5c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-25.5c0,-1.65109 -1.34891,-3 -3,-3zM62,35c-1.65109,0 -3,1.34891 -3,3v1.5c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-1.5c0,-1.11091 0.88909,-2 2,-2c1.11091,0 2,0.88909 2,2v35c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-25.5c0.00255,-0.18032 -0.09219,-0.34804 -0.24794,-0.43894c-0.15575,-0.0909 -0.34838,-0.0909 -0.50413,0c-0.15575,0.0909 -0.25049,0.25863 -0.24794,0.43894v25.5c0,1.65109 1.34891,3 3,3c1.65109,0 3,-1.34891 3,-3v-35c0,-1.65109 -1.34891,-3 -3,-3zM38,36c1.11091,0 2,0.88909 2,2v35c0,1.11091 -0.88909,2 -2,2c-1.11091,0 -2,-0.88909 -2,-2v-35c0,-1.11091 0.88909,-2 2,-2zM59.49219,41.99219c-0.13261,0.00207 -0.25896,0.05673 -0.35127,0.15197c-0.0923,0.09523 -0.14299,0.22324 -0.14092,0.35584v2c-0.00255,0.18032 0.09219,0.34804 0.24794,0.43894c0.15575,0.0909 0.34838,0.0909 0.50413,0c0.15575,-0.0909 0.25049,-0.25863 0.24794,-0.43894v-2c0.00212,-0.13532 -0.0507,-0.26572 -0.1464,-0.36141c-0.0957,-0.0957 -0.22609,-0.14852 -0.36141,-0.1464z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
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
                        <th scope="col" class="px-6 py-3">Last Name</th>
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
