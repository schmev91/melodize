@extends("components.layouts.client")

@section("content")
    <section class="mb-5">
        <div class="prose mb-3 flex items-center gap-2">
            <h1 class="prose-h3: m-0 text-white">User uploaded</h1>
            <x-player.play
                id="btn-play_userUploaded"
                class="btn btn-primary h-8 stroke-white"
            >
                Play all
            </x-player.play>
        </div>
        <div class="carousel carousel-start space-x-3">
            @foreach ($tracks as $track)
                <div class="carousel-item">
                    <div class="group/track flex cursor-pointer flex-col gap-1">
                        <img
                            class="h-56 w-56 rounded-box object-cover opacity-75 transition-opacity duration-300 ease-out group-hover/track:opacity-100"
                            src="{{ Storage::url($track->cover) }}"
                            alt="{{ $track->title }} cover"
                        />
                        <div class="flex max-w-56 flex-col">
                            <span
                                class="line-clamp-1 w-fit text-lg font-medium text-white mix-blend-difference transition-colors duration-300 ease-out group-hover/track:text-hypergreen"
                            >
                                {{ $track->title }}
                            </span>
                            <span
                                class="line-clamp-1 text-sm text-white mix-blend-difference transition-colors duration-300 ease-out group-hover/track:text-hypergreen"
                            >
                                {{ $track->artist }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @vite("resources/dist/js/page/home.js")
@endsection
