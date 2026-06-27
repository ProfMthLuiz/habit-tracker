@php
    $type = session()->has('success') ? 'success' : (session()->has('error') ? 'error' : 'warning');

    $message = session($type);

    $styles = [
        'success' => 'bg-green-100 border-green-400 text-green-700',
        'error' => 'bg-red-100 border-red-400 text-red-700',
        'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
    ];
@endphp

@if ($message)
    <div id="toast" class="absolute top-22 right-20  px-4 py-3 mb-4 flex gap-2 items-center {{ $styles[$type] }}">
        <x-dynamic-component :component="'icons.' . $type" class="mt-4" />
        <p class="">
            {{ $message }}
        </p>
    </div>
@endif
