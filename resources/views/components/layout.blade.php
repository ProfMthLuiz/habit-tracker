<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap');
    </style>

    <title>
        {{ config('app.name') }}
    </title>
</head>

<body class="bg-[#FFEDD6] min-h-screen flex flex-col justify-between font-mono relative">
    {{-- HEADER --}}
    <x-header />
    <x-toast />
    {{ $slot }}
    <x-footer />

    <script type="module" src="{{ Vite::asset('resources/js/app.js') }}"></script>
</body>

</html>
