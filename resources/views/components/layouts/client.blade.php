<x-layouts.app title="Melodize">
    <div class="flex flex-col justify-between gap-6 bg-white">
        <livewire:client.header />

        <div class="container min-h-screen">
            @yield("content")
        </div>

        @once
            <x-client.footer />
        @endonce
    </div>
</x-layouts.app>

{{--
    <x-layouts.app title="Melodize">
    <div class="flex flex-col justify-between gap-6 bg-white">
    <livewire:client.header />
    
    <div class="container min-h-screen">
    {{ $slot }}
    </div>
    
    @once
    <x-client.footer />
    @endonce
    </div>
    </x-layouts.app>
--}}
