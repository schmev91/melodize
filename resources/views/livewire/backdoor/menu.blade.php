{{-- Success is as dangerous as failure. --}}
<div
    class="flex h-full flex-col gap-9 rounded-box bg-opacity-90 bg-client py-3"
>
    <div class="prose mix-blend-difference">
        <h1 class="px-3 text-white">Backdoor</h1>
    </div>

    <div class="rounded-m flex flex-col gap-2">
        <x-backdoor.menu-item :route="route('backdoor.dashboard')">
            <x-svg.transparent-cube />
            Dashboard
        </x-backdoor.menu-item>
        <x-backdoor.menu-item :route="route('client.home')">
            <x-svg.users />
            Users
        </x-backdoor.menu-item>
        <x-backdoor.menu-item :route="route('backdoor.tracks.index')">
            <x-svg.musical-note />
            Tracks
        </x-backdoor.menu-item>
        <x-backdoor.menu-item :route="route('backdoor.playlists.index')">
            <x-svg.list />
            Playlists
        </x-backdoor.menu-item>
        <x-backdoor.menu-item :route="route('backdoor.genres.index')">
            <x-svg.genre />
            Genres
        </x-backdoor.menu-item>
        <x-backdoor.menu-item :route="route('backdoor.sources.index')">
            <x-svg.source />
            Sources
        </x-backdoor.menu-item>
    </div>

    <div class="px-3 font-bold text-white mix-blend-difference">
        @2024 Melodize
    </div>
</div>
