@extends("layouts.client")

@section("content")
    <div class="posts-container flex flex-col gap-3">
        <div class="prose">
            <h1 class="text-white">Posts</h1>
        </div>
        <div class="flex gap-2">
            <div>
                <x-layout.post-options
                    :route="route('client.posts.mostviewed')"
                    :condition="Route::is('client.posts.mostviewed')"
                >
                    Most viewed
                </x-layout.post-options>
                <x-layout.post-options
                    :route="route('client.posts.newest')"
                    :condition="Route::is('client.posts.newest')"
                >
                    Newest
                </x-layout.post-options>
            </div>
            <div>
                <x-layout.post-options
                    :route="route('client.posts.type', ['type' => 'article'])"
                    :condition="request()->input('type') == 'article'"
                >
                    Article
                </x-layout.post-options>

                <x-layout.post-options
                    :route="route('client.posts.type', ['type' => 'review'])"
                    :condition="request()->input('type') == 'review'"
                >
                    Review
                </x-layout.post-options>

                <x-layout.post-options
                    :route="route('client.posts.type', ['type' => 'news'])"
                    :condition="request()->input('type') == 'news'"
                >
                    News
                </x-layout.post-options>
            </div>
        </div>
        @foreach ($posts as $p)
            <x-post-item :post="$p" />
        @endforeach
    </div>
@endsection
