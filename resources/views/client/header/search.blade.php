<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
<div id="search" class="relative ms-6">
    <input
        id="header-search-input"
        wire:model.live.debounce.500ms="search"
        type="text"
        placeholder="Swearch UwO?"
        class="form-input z-20 h-8 w-[30rem] rounded-md bg-slate-200"
        required
        autocomplete="off"
    />
    <button type="button" class="z-20" wire:click="searchTracks">
        <span class="absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer">
            <x-svg.glass />
        </span>
    </button>
    @if ($searchResult->isNotEmpty())
        <div
            class="input absolute top-8 -z-10 flex h-fit w-[30rem] flex-col gap-2 rounded-b-md rounded-t-none bg-wall bg-opacity-35 py-4"
        >
            @foreach ($searchResult as $track)
                <a
                    class="flex gap-3 rounded-md px-3 py-2 hover:bg-hypergreen hover:bg-opacity-30"
                    wire:navigate
                    href="{{ route("client.track.show", $track->id) }}"
                >
                    <img
                        src="{{ Storage::url($track->cover) }}"
                        class="h-12 w-12 rounded-sm object-cover"
                        alt="{{ $track->title }}"
                    />
                    <div class="flex flex-col justify-between">
                        <span class="line-clamp-2 font-medium text-white">
                            {{ $track->title }}
                        </span>
                        <span class="line-clamp-1 text-gray-200">
                            {{ $track->artist }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
