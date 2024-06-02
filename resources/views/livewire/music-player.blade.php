{{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div
        id="music-player"
        class="container fixed bottom-0 z-10 grid grid-cols-3 bg-black py-2"
    >
        {{-- START --}}
        <x-player.label />

        {{-- CENTER --}}
        <div
            id="player-controller"
            class="col-auto flex flex-col justify-center gap-2 justify-self-center"
        >
            <div id="ctrl-btns" class="flex items-center justify-center gap-5">
                <x-player.loop
                    class="stroke-white hover:stroke-hypergreen"
                    id="player-loop"
                />
                <x-player.previous
                    class="stroke-white hover:stroke-hypergreen"
                    id="player-previous"
                />
                <x-player.pause
                    class="hidden stroke-white hover:stroke-hypergreen"
                    id="player-pause"
                />
                <x-player.play
                    class="stroke-white hover:stroke-hypergreen"
                    id="player-play"
                />
                <x-player.next
                    class="stroke-white hover:stroke-hypergreen"
                    id="player-next"
                />
                <x-player.shuffle
                    class="fill-white stroke-white hover:fill-hypergreen hover:stroke-hypergreen"
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
            <x-player.volume />
            <x-player.heart class="stroke-white hover:stroke-hypergreen" />
            <x-player.queue class="stroke-white hover:stroke-hypergreen" />
        </div>
    </div>
    @vite("resources/dist/js/music-player/index.js")
