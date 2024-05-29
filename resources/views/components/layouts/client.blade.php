<x-layouts.app title="Melodize">
    {{-- theme --}}
    <input
        type="checkbox"
        class="theme-controller hidden"
        value="melodize"
        checked
    />

    <div
        class="flex max-h-screen min-h-screen flex-col justify-between overflow-y-scroll bg-wall"
    >
        <livewire:client.header />

        <div class="container glass z-10 grow">
            <div class="py-6">
                @yield("content")
            </div>
        </div>

        @once
            <x-client.footer />
        @endonce
    </div>

    @livewire("auth.register")
    @livewire("auth.login")
</x-layouts.app>
