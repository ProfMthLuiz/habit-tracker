<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 w-full">
        <x-navbar />

        <div class="flex flex-col gap-4 items-start">
            <x-title>
                Configurar Hábitos
            </x-title>

            <ul class="flex flex-col gap-2 mt-2 w-full">
                @forelse($habits as $habit)
                    <li class="flex gap-2 items-center justify-between w-full">
                        <div class="habit-shadow-lg p-2 bg-[#ffdaac] w-full">
                            <p class="font-bold text-lg">
                                {{ $habit->name }}
                            </p>

                        </div>
                        <a class="bg-white habit-btn habit-shadow-lg p-2 border-2 border-white hover:opacity-50 cursor-pointer"
                            href="{{ route('habits.edit', $habit->id) }}">
                            <x-icons.edit />
                        </a>
                        <form action="{{ route('habits.destroy', $habit) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 habit-btn habit-shadow-lg text-white p-2 border-2 hover:opacity-50 cursor-pointer">
                                <x-icons.trash />
                            </button>
                        </form>
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
