@props([
    "route" => [],
])

<li
    @class(["rounded-md bg-slate-300 text-slate-800" => $route == url()->current()])
>
    <a href="{{ $route }}">{{ $slot }}</a>
</li>
