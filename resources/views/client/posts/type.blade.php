@extends("layouts.client")

@section("content")
    <div class="posts-container flex flex-col gap-3">
        <div class="prose">
            <h1 class="text-white">Filtered by post type</h1>
        </div>
        <div>
            <a
                href="{{ route("client.posts.type", ["type" => "article"]) }}"
                class="badge {{ request()->input("type") == "article" ? "badge-primary" : "badge-outline" }}"
            >
                Article
            </a>

            <a
                href="{{ route("client.posts.type", ["type" => "review"]) }}"
                class="badge {{ request()->input("type") == "review" ? "badge-primary" : "badge-outline" }}"
            >
                Review
            </a>

            <a
                href="{{ route("client.posts.type", ["type" => "news"]) }}"
                class="badge {{ request()->input("type") == "news" ? "badge-primary" : "badge-outline" }}"
            >
                News
            </a>
        </div>
        @foreach ($posts as $p)
            <x-post-item :post="$p" />
        @endforeach
    </div>
@endsection
