<div class="prose mb-3 flex items-center gap-2">
    <h1 class="prose-h3: m-0 text-white">User uploaded</h1>
    <x-player.play
        id="btn-play_userUploaded"
        class="flex items-center gap-1 rounded-md bg-hypergreen stroke-white px-2 py-1 font-medium text-white"
    >
        Play all
    </x-player.play>
</div>

<div class="carousel carousel-start items-center space-x-3">
    @foreach ($tracks as $track)
        <div class="carousel-item">
            <a
                href="{{ route("client.track.show", $track->id) }}"
                wire:navigate
                class="group/track flex flex-col gap-1"
            >
                <img
                    class="h-48 w-48 rounded-box object-cover opacity-75 transition-opacity duration-300 ease-out group-hover/track:opacity-100"
                    src="{{ Storage::url($track->cover) }}"
                    alt="{{ $track->title }} cover"
                />
                <div class="flex max-w-48 flex-col bg-clip-text">
                    <span
                        class="line-clamp-1 text-lg font-medium text-white mix-blend-difference transition-colors duration-300 ease-out group-hover/track:text-hypergreen"
                    >
                        {{ $track->title }}
                    </span>
                    <span
                        class="line-clamp-1 text-sm text-white mix-blend-difference transition-colors duration-300 ease-out group-hover/track:text-hypergreen"
                    >
                        {{ $track->artist }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach

    <span
        class="loading loading-spinner loading-lg size-20 -translate-y-6 bg-slate-300"
    ></span>
</div>
