@extends("layouts.client")

@section("content")
    <div class="posts-container flex flex-col gap-3">
        <div class="prose">
            <h1 class="text-white">Most viewed posts</h1>
        </div>
        @foreach ($posts as $p)
            <div class="card card-side glass shadow-xl">
                <img
                    class="w-1/4 object-cover"
                    src="{{ asset($p->thumbnail) }}"
                    alt="post-img"
                />
                <div class="card-body flex-grow">
                    <h1 class="card-title prose-h3: line-clamp-1">
                        {{ $p->title }}
                    </h1>
                    <p class="line-clamp-4 text-lg">{{ $p->content }}</p>
                    <div class="card-actions items-end justify-between">
                        <div class="badge badge-neutral gap-1">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>
                            {{ $p->views }}
                        </div>
                        <button class="btn btn-primary">Detail</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
