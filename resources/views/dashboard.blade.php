<x-layout>
    <main class="max-w-7xl mx-auto py-10 px-4">
        <x-navbar />

        @session('success')
            <div class="flex">
                <p class="bg-green-100 block border-2 border-green-400 text-green-700 px-4 py-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            @forelse($habits as $habit)
                <x-contribution :habit="$habit" />
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

            <h2 class="text-lg mt-8 mb-2">
                {{ date('d/m/Y') }}
            </h2>

            <ul class="flex flex-col gap-2">
                @forelse($habits as $habit)
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <form action="{{ route('habits.toggle', $habit->id) }}" class="flex gap-2 items-center"
                            method="POST" id="form-{{ $habit->id }}">
                            @csrf
                            <input type="checkbox" class="w-5 h-5" {{ $habit->wasCompletedToday() ? 'checked' : '' }}
                                onchange="document.getElementById('form-{{ $habit->id }}').submit()">
                            <p class="font-bold text-lg">
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
        </div>
    </main>
</x-layout>
