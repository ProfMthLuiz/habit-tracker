<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <title>
      {{ config('app.name') }}
    </title>
  </head>
  <body class="bg-[#FFEDD6]">
    {{-- HEADER --}}
    <x-header/>
    {{ $slot }}
    <x-footer/>
  </body>
</html>

