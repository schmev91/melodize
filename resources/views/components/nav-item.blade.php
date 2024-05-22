<!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

@props([
    "name" => "",
    "active" => null,
    "key" => "",
])
<a
    href="{{ route($name) }}"
    wire:navigate
    wire:key="{{ $key }}"
    @class([
        "flex h-full items-center border-x border-wall border-opacity-50 p-2 px-8 hover:text-white",
        $active ? "bg-wall bg-opacity-50 text-white" : "text-slate-400",
    ])
>
    {{ $slot }}
</a>
