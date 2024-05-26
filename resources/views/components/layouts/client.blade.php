<x-layouts.app title="Melodize">
    {{-- theme --}}
    <input
        type="checkbox"
        class="theme-controller hidden"
        value="melodize"
        checked
    />

    <div class="flex flex-col justify-between gap-3 bg-wall">
        <livewire:client.header />

        <div class="container min-h-screen rounded-md">
            <div class="glass">
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
