<x-layouts.app title="Melodize">
    <div
        id="client-container"
        class="flex flex-col justify-between gap-3 bg-client"
    >
        {{-- HEADER --}}
        @include("client.partials.header")

        <div class="container min-h-screen">
            {{ $slot }}
        </div>

        {{-- FOOTER --}}
        @include("client.partials.footer")
    </div>
</x-layouts.app>
