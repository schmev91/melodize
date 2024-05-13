@props([
    'route' => [],
])
@if ($route == url()->current())
    <a href="{{ $route }}" class="text-gray-700 underline">{{ $slot }}</a>
@else
    <a href="{{ $route }}"
        class="transition-all duration-300 text-gray-400 hover:text-gray-700 hover:underline">{{ $slot }}</a>
@endif
