{{-- If your happiness depends on money, you will never be happy with yourself. --}}
@persist("music-player")
    <div
        class="container fixed bottom-0 grid grid-cols-3 border-t border-gray-300 bg-gray-100 py-2"
    >
        <audio
            autoplay
            src="{{ Storage::url("tracks/Mikazuki Step (r-906；三日月ステップ)／DAZBEE (Cover).mp3") }}"
        ></audio>
        <div id="player-label" class="col-start-1 flex items-center gap-3">
            <img
                class="h-16 w-16 rounded-md object-cover"
                src="{{ asset("img/default/track.png") }}"
                alt=""
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
                <x-player.loop />
                <x-player.previous wire:click="test" />
                <x-player.pause />
                <x-player.next />
                <x-player.shuffle />
            </div>
            <div id="duration" class="flex items-center gap-2">
                <small class="font-medium text-neutral">0:00</small>
                <progress
                    class="progress w-[27rem]"
                    value="72"
                    max="100"
                ></progress>
                <small class="font-medium text-neutral">3:19</small>
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
@endpersist('music-player')
