<!-- Life is available only in the present moment. - Thich Nhat Hanh -->

@props([
    "route" => "/",
])
<a
    wire:navigate
    href="{{ $route }}"
    @class([
        "flex max-w-full gap-2 px-3 py-4 font-medium text-white mix-blend-difference transition-all duration-300",
        request()->url() == $route
            ? "gap-5 border-s-[8px] border-hypergreen bg-hypergreen bg-opacity-30 ps-8"
            : "hover:gap-5 hover:bg-hypergreen hover:bg-opacity-30 hover:ps-8",
    ])
>
    {{ $slot }}
</a>
