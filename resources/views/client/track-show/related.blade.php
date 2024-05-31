<div id="related" class="flex flex-col gap-3">
    <div class="prose">
        <h1 class="prose-h3: text-gray-300">Related tracks</h1>
    </div>
    <div
        class="related-container flex max-h-96 flex-col gap-3 overflow-y-scroll"
    >
        @foreach ($related as $i)
            <a
                href="{{ route("client.track.show", $i->id) }}"
                class="flex gap-2 rounded-sm px-2 py-1"
            >
                <img
                    src="{{ Storage::url($i->cover) }}"
                    class="h-12 w-12 object-cover"
                />
                <div class="flex flex-col justify-between">
                    <p class="text-lg text-white">{{ $i->title }}</p>
                    <p class="text-gray-400">{{ $i->artist }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
