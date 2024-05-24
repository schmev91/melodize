{{-- If your happiness depends on money, you will never be happy with yourself. --}}
@persist("music-player")
    <div
        class="container fixed bottom-0 grid grid-cols-3 border-t border-gray-300 bg-gray-100 py-2"
    >
        <div id="player-label" class="col-start-1 flex items-center gap-3">
            <img
                class="h-16 w-16 rounded-md object-cover"
                src="{{ Storage::url("img/default/track.png") }}"
            />
            <div class="label-info flex flex-col gap-1">
                <span class="text-md text-lg font-medium">Sugarcoat</span>
                <span class="text-sm font-medium text-gray-500">DAZBEE</span>
            </div>
        </div>

        <div
            id="player-controller"
            class="col-auto flex flex-col justify-center gap-2 justify-self-center"
        >
            <div id="ctrl-btns" class="flex items-center justify-center gap-5">
                <x-player.loop id="player-loop" />
                <x-player.previous id="player-previous" />
                <x-player.pause id="player-pause" class="hidden" />
                <x-player.play id="player-play" />
                <x-player.next id="player-next" />
                <x-player.shuffle id="player-shuffle" />
            </div>
            <div id="duration" class="flex items-center gap-2">
                <small
                    id="current-duration"
                    class="font-medium text-neutral"
                ></small>
                <progress
                    id="player-progress"
                    class="progress w-[27rem]"
                    value="0"
                    max="100"
                ></progress>
                <small
                    id="max-duration"
                    class="font-medium text-neutral"
                ></small>
            </div>
        </div>
        <div
            id="player-options"
            class="col-start-3 flex items-center gap-5 justify-self-end"
        >
            <x-player.heart />
            <x-player.volume-on />
            <x-player.queue />
        </div>
    </div>
    @vite("resources/js/music-player.js")
    <script type="module">
        // const { Howl, Howler } = require('howler');

        // // // Initialize Howler.js
        // var sound = new Howl({
        //     src: ['{{ Storage::url("tracks/dazbee_catchy.mp3") }}'],
        // });

        // // Play the audio when ready
        // sound.once('load', function () {
        //     sound.play();
        // });
    </script>
@endpersist('music-player')
