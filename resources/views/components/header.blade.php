<header class="bg-white border-b-2  ">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
        {{--  LOGO --}}
        <div class="flex items-center gap-2 font-bold">
            <a href="/" class="habit-btn habit-shadow-lg bg-habit-orange px-2 py-1">HT</a>
            <p>Habit Tracker</p>
        </div>

        <div class="flex gap-2 items-center">
            @auth
                <form class="inline " action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="habit-btn habit-shadow-lg p-2 border-2">Sair</button>
                </form>
            @endauth

            @guest
                <div class="flex gap-2">
                    <a href="{{ route('site.login') }}"
                        class=" p-2 border-2 habit-shadow-lg bg-habit-orange habit-btn">Logar</a>
                    <a href="{{ route('site.register') }}"
                        class=" p-2 border-2 habit-shadow-lg bg-white habit-btn">Cadastrar</a>
                </div>

            @endguest

            <a class="habit-btn habit-shadow-lg p-2" href="#">
                <x-icons.github />
            </a>
        </div>
    </div>




</header>
