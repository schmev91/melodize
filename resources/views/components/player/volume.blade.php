<div id="volume-controller" class="flex items-center gap-2">
    <x-player.volume-on class="stroke-white hover:stroke-hypergreen" />
    <x-player.volume-off class="hidden stroke-white hover:stroke-hypergreen" />
    <progress
        id="player-volumeBar"
        class="progress progress-accent h-1 w-28 cursor-pointer bg-gray-500"
        min="0"
        max="1"
        value="1"
    ></progress>
</div>
