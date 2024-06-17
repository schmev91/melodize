<div class="flex items-center gap-2">
    <button
        @click="{{ auth()->check() ? '$wire.like()' : "login_modal.show()" }}"
        class="flex items-center gap-1 rounded-md bg-[#ebabb5] stroke-white px-1 font-medium text-white"
    >
        <x-svg.heart class="size-5 stroke-2" />
        Like
    </button>
    <button
        @click="{{ auth()->check() ? '$wire.addPlaylist()' : "login_modal.show()" }}"
        class="flex items-center gap-1 rounded-md bg-[#9eb3e6] stroke-white px-1 font-medium text-white"
    >
        <x-svg.squares-plus class="size-5 stroke-2" />
        Add to playlist
    </button>
    <button
        @click="{{ auth()->check() ? '$wire.addQueue()' : "login_modal.show()" }}"
        class="flex items-center gap-1 rounded-md bg-[#919191] stroke-white px-1 font-medium text-white"
    >
        <x-svg.plus class="h-[1.1rem] w-[1.1rem] stroke-2" />
        Queue
    </button>
</div>
