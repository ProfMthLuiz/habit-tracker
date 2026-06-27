<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
        <x-navbar />

        <div class="flex flex-col gap-4 items-start">
            <x-title>
                Histórico de Hábitos
            </x-title>
            @foreach ($avaliableYears as $y)
                <a href="{{ route('habits.history', $y) }}"
                    class="habit-btn habit-shadow-lg p-2 inline-block {{ $selectedYear == $y ? 'bg-habit-orange' : 'bg-white' }}">
                    {{ $y }}
                </a>
            @endforeach
        </div>

        <div>
            @forelse($habits as $habit)
                <x-contribution :$habit :year="$selectedYear" />
            @empty
                <div>
                    <p class="text-black">
                        Nenhum hábito para exibir histórico.
                    </p>
                    <a href="{{ route('habits.create') }}" class="underline ">
                        Crie um novo hábito
                    </a>
                </div>
            @endforelse
        </div>
    </main>
</x-layout>
