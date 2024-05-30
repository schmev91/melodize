<!-- Life is available only in the present moment. - Thich Nhat Hanh -->

@props([])
<a
    wire:navigate
    href="#"
    class="backdoor-menu-item flex max-w-full gap-2 px-3 py-4 font-medium text-white transition-all duration-300 hover:gap-5 hover:bg-hypergreen hover:bg-opacity-30 hover:ps-8"
>
    {{ $slot }}
</a>
