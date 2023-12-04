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
                                    <p>text1</p>
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
