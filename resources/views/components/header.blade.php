<header class="bg-white border-b-2 flex items-center justify-between p-5">
    {{--  LOGO --}}
    <div>LOGO</div>

    {{-- GitHub --}}
    <div>GITHUB

        @auth
            <form class="inline" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-white p-2 border-2">Sair</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('site.login') }}" class="bg-white p-2 border-2">Login</a>
        @endguest
    </div>


</header>
