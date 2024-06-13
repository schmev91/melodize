{{-- The best athlete wants his opponent at his best. --}}
<x-layouts.client>
    <section id="your-playlists">
        <div class="prose mb-3 flex items-center gap-2">
            <h1 class="prose-h3: m-0 text-white">Your playlist</h1>
        </div>
    </section>
    <section id="your-uploads">
        <div class="prose mb-3 flex items-center gap-2">
            <h1 class="prose-h3: m-0 text-white">Your uploads</h1>
        </div>

        <div class="flex flex-wrap gap-6">
            @foreach ($tracks as $track)
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
            @endforeach
        </div>
    </section>
</x-layouts.client>
