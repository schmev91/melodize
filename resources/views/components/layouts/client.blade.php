<x-layouts.app title="Melodize">
    {{-- theme --}}
    <input
        type="checkbox"
        class="theme-controller hidden"
        value="light"
        checked
    />

    <div class="flex flex-col justify-between gap-6 bg-white">
        <livewire:client.header />

        <div class="container min-h-screen rounded-md">
            @yield("content")
        </div>

        @once
            <x-client.footer />
        @endonce
    </div>

    @livewire("auth.register")
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
