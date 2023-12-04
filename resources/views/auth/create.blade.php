<x-layout-login>
    <div class="flex flex-col items-center justify-center">
        <div class="my-16 text-center text-3xl ">
            <i class="fa-solid fa-user"></i>
        </div>


        <x-card class="py-8 px-16 max-w-sm flex items-center justify-center">
            <form action="{{ route('auth.store') }}" method="POST" class="flex flex-col items-center justify-center">
                @csrf
                <div>
                    <input type="text" placeholder="ID" name="username" id="username" value="" autofocus
                        @class(['border-red-500', $errors->has('username')])>
                    @error('username')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="text-white  bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g clip-path="url(#clip0_429_11126)">
                                    <path d="M9 4.00018H19V18.0002C19 19.1048 18.1046 20.0002 17 20.0002H9"
                                        stroke="#fcfcfc" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M12 15.0002L15 12.0002M15 12.0002L12 9.00018M15 12.0002H5" stroke="#fcfcfc"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_429_11126">
                                        <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </g>
                        </svg>
                        Access
                    </button>
                </div>
            </form>
        </x-card>

    </div>

</x-layout-login>
