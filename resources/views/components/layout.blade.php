<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Life-File</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body
    class="mx-auto mt-10 max-w-6xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90%">

    {{-- Title for Auth and guest --}}
    @auth
        <h1 class="text-center text-2xl font-bold mb-12">Administrative Menu</h1>
    @endauth
    @guest
        <h1 class="text-center text-2xl font-bold mb-12">Employers</h1>
    @endguest




    {{-- Navigation --}}
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>{{ now()->format('d-m-Y H:i') }}</li>
        </ul>
        <ul class="flex space-x-2">
            @auth
                <li>Welcome | {{ auth()->user()->username ?? 'Anonymous' }} |</li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('auth.create') }}">Login</a>
                </li>
                {{-- <li>
                    <a href="{{ route('auth.create') }}">Register</a>
                </li> --}}
            @endguest
        </ul>
    </nav>
    {{-- Session Alerts --}}
    <div x-data="{ flash: true }">
        @if (session('success'))
            <div x-show="flash"
                class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
                <div>{{ session('status') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
    </div>
    <div x-data="{ flash: true }">
        @if (session('error'))
            <div x-show="flash"
                class="relative mb-10 rounded border border-red-400 bg-red-100 px-4 py-3 text-lg text-red-700"
                role="alert">
                <strong class="font-bold">{{ session('error') }}</strong>
                <div>{{ session('status') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        @endif
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    @auth
        <div class="flex justify-end mb-4 gap-3">
            {{-- Import a csv --}}
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center items-center gap-1">
                    <input
                        class="block px-1 py-2.5 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" name="file" accept=".csv">
                    <button
                        class="inline-flex items-center px-5 text-4  text-center text-white bg-gray-500 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300"
                        type="submit">Import .csv</button>
                </div>
            </form>
            <a href="{{ route('users.create') }}"
                class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{-- <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg> --}}
                New Employee
            </a>
        </div>
    @endauth


    {{-- @if (session()->has('success'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif --}}

    {{-- @if (session()->has('error'))
        <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif --}}

    {{ $slot }}
</body>

</html
