{{-- If your happiness depends on money, you will never be happy with yourself. --}}
@persist("music-player")
    <div class="container fixed bottom-0 grid grid-cols-3 bg-zinc-700 py-2">
        {{-- START --}}
        <x-player.label />

        {{-- CENTER --}}
        <div
            id="player-controller"
            class="col-auto flex flex-col justify-center gap-2 justify-self-center"
        >
            <div id="ctrl-btns" class="flex items-center justify-center gap-5">
                <x-player.loop class="stroke-white" id="player-loop" />
                <x-player.previous class="stroke-white" id="player-previous" />
                <x-player.pause class="hidden stroke-white" id="player-pause" />
                <x-player.play class="stroke-white" id="player-play" />
                <x-player.next class="stroke-white" id="player-next" />
                <x-player.shuffle
                    class="fill-white stroke-white"
                    id="player-shuffle"
                />
            </div>
            <x-player.progress />
        </div>

        {{-- END --}}
        <div
            id="player-options"
            class="col-start-3 flex items-center gap-5 justify-self-end"
        >
            <x-player.heart class="stroke-white" />
            <x-player.volume-on class="stroke-white" />
            <x-player.queue class="stroke-white" />
        </div>
    </div>
    @vite("resources/js/music-player.js")
@endpersist('music-player')
