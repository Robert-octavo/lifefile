<x-layout>
    <h1 class="text-center text-2xl font-bold">Administrative Menu</h1>
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>{{ now()->format('d-m-Y H:i') }}</li>
        </ul>
        <ul class="flex space-x-2">
            <li>Welcome | {{ auth()->user()->username ?? 'Anonymous' }} |</li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div>
        <p>Text</p>
        <i class="fa-solid fa-shield-halved"></i>
    </div>
</x-layout>
