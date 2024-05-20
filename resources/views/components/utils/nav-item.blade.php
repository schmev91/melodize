@props([
    "route" => [],
])

<li
    @class([
        "rounded-t-none py-0 font-medium",
        "rounded-md bg-slate-300 text-slate-800" => $route == url()->current(),
    ])
>
    <a class="py-3" wire:navigate href="{{ $route }}">{{ $slot }}</a>
</li>
