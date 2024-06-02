<x-layouts.app title="Melodize">
    <div
        class="flex max-h-screen min-h-screen flex-col justify-between overflow-y-scroll bg-wall"
    >
        <livewire:client.header />

        <div class="container glass z-10 grow">
            <div class="py-6">
                {{ $slot }}
            </div>
        </div>

        @once
            <x-client.footer />
        @endonce
    </div>

    @livewire("auth.register")
    @livewire("auth.login")
</x-layouts.app>
