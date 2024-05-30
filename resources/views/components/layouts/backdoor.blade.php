<x-layouts.app title="Backdoor">
    <div
        class="flex max-h-screen min-h-screen flex-col justify-between overflow-y-scroll bg-wall"
    >
        <livewire:client.header />

        <div class="container glass z-10 flex grow gap-10 py-6">
            @livewire("backdoor.menu")
            <div>
                @yield("content")
            </div>
        </div>

        @once
            <x-client.footer />
        @endonce
    </div>
</x-layouts.app>
