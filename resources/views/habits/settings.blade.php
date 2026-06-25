<x-layout>
    <main class="py-10 px-4">
        <x-navbar />

        @session('success')
            <div class="flex">
                <p class="bg-green-100 block border-2 border-green-400 text-green-700 px-4 py-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-lg mt-8 mb-2">
                Configurar Hábitos
            </h2>

            <ul class="flex flex-col gap-2">
                @forelse($habits as $habit)
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">
                                {{ $habit->name }}
                            </p>
                            <a class="bg-blue-500 p-1 border-2 border-white hover:opacity-50 cursor-pointer"
                                href="{{ route('habits.edit', $habit->id) }}">
                                <x-icons.edit />
                            </a>
                            <form action="{{ route('habits.destroy', $habit) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white p-1 border-2 hover:opacity-50 cursor-pointer">
                                    <x-icons.trash />
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <p class="pl-4">
                        Ainda não tem nenhum hábito cadastrado
                    </p>
                    <a href="{{ route('habits.create') }}" class="bg-white p-2 border-2">
                        Cadastre um novo hábito agora
                    </a>
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>
