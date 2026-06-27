<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full flex flex-col justify-center ">
        <h1 class="font-bold text-2xl text-center">Cadastrar novo hábito</h1>

        <section class="habit-shadow-lg bg-white max-w-[600px] mx-auto p-10 pb-6 mt-4 w-full">
            <form action="{{ route('habits.store') }}" method="POST">
                @csrf

                <div class="flex flex-col gap-2 mb-4">
                    <label for="name" class="text-xl font-bold">Nome do hábito</label>
                    <input type="text" name="name" placeholder="Ex: Ler 10 páginas"
                        class="bg-white p-2 habit-shadow @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="bg-habit-orange p-2 mt-2 habit-shadow-lg habit-btn transition duration-300 ease-in-out hover:bg-white">Cadastrar
                        hábito</button>
                </div>
            </form>
        </section>
    </main>
</x-layout>
