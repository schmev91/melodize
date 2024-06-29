<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<a
    id="player-label"
    wire:navigate
    class="col-start-1 flex w-fit items-center gap-3"
>
    <img
        id="player-trackCover"
        class="h-16 w-16 rounded-md object-cover"
        src="{{ asset("img/utils/r906_mawaru.gif") }}"
    />
    <div class="label-info flex flex-col gap-1">
        <span
            id="player-trackTitle"
            class="text-md text-lg font-medium text-white"
        >
            Let make some noise!
        </span>
        <span id="player-trackArtist" class="text-sm font-medium text-gray-200">
            melodize
        </span>
    </div>
</a>
