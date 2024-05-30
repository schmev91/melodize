<x-layouts.app title="Melodize">
    <div
        class="flex max-h-screen min-h-screen flex-col justify-between overflow-y-scroll bg-wall"
    >
        <div class="container glass z-10 grow">
            <div class="py-6">
                @yield("content")
            </div>
        </div>

        @endonce
    </div>
</x-layouts.app>
