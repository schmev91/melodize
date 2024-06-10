{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<div>
    <script>
        window.showingTrack = @json($track);
    </script>

    <section class="flex gap-10">
        <div class="track-detail flex flex-grow flex-col justify-between gap-3">
            <div class="detail-top flex justify-between">
                <div class="flex gap-2">
                    <button
                        id="playCurrentShowing"
                        class="btn-circle btn-lg bg-hypergreen p-3"
                    >
                        <x-svg.sharp-play class="mx-auto" />
                    </button>
                    <div class="flex flex-col justify-between">
                        <span class="mb-1 bg-wall px-2 text-4xl text-white">
                            {{ $track->title }}
                        </span>
                        <span class="w-fit bg-wall px-2 text-gray-300">
                            {{ $track->artist }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-col items-end gap-2">
                    <p class="text-lg font-medium text-white">
                        {{ $track->created_at }}
                    </p>
                    @if ($track->genres->isNotEmpty())
                        <div class="flex max-w-72 flex-wrap justify-end gap-2">
                            @foreach ($track->genres as $genre)
                                <span class="badge badge-neutral">
                                    #{{ $genre->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <div id="waveform" class="group/waveform relative">
                    <div id="waveform-loading" class="flex justify-center">
                        <span class="loading loading-bars loading-lg"></span>
                    </div>
                    <div
                        id="waveform-hover"
                        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-0 bg-hypergreen bg-opacity-35 opacity-0 mix-blend-overlay transition-opacity duration-200 ease-linear group-hover/waveform:opacity-100"
                    ></div>
                </div>
            </div>
        </div>
        <div class="track-image">
            <img
                class="h-96 w-96 object-cover"
                src="{{ Storage::url($track->cover) }}"
                alt=""
            />
        </div>
    </section>

    <section class="mt-5 flex justify-between">
        @include("client.track-show.comments")
        @include("client.track-show.related")
    </section>
</div>
