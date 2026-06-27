<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
        <x-navbar />

        <div class="flex flex-col gap-4 items-start">
            <x-title>
                {{ \Carbon\Carbon::now()->locale('pt_BR')->translatedFormat('l, d \d\e F') }}
            </x-title>

            <ul class="flex flex-col gap-2 w-full">
                @forelse($habits as $habit)
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <form action="{{ route('habits.toggle', $habit->id) }}" class="flex gap-2 items-center"
                            method="POST" id="form-{{ $habit->id }}">
                            @csrf
                            <input type="checkbox" class="w-5 h-5" {{ $habit->wasCompletedToday() ? 'checked' : '' }}
                                onchange="document.getElementById('form-{{ $habit->id }}').submit()">
                            <p
                                class="font-bold text-lg {{ $habit->wasCompletedToday() ? 'line-through text-gray-600' : '' }}">
                                {{ $habit->name }}
                            </p>
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

            <a href="{{ route('habits.create') }}" class=" p-2 border-2 habit-shadow-lg bg-habit-orange habit-btn">+
                Adicionar</a>
        </div>
    </main>
</x-layout>
