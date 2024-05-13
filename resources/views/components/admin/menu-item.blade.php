@props([
    'route' => [],
])

@if ($route == url()->current())
    <a href="{{ $route }}" class="p-2 border-s-[6px] border-l-green-500">
        {{ $slot }}
    </a>
@else
    <a href="{{ $route }}" class="p-2 hover:bg-slate-300">
        {{ $slot }}
    </a>
@endif
