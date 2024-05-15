@extends("layouts.client")

@section("content")
    <div class="posts-container flex flex-col gap-3">
        <div class="prose">
            <h1 class="text-white">Newests posts</h1>
        </div>
        @foreach ($posts as $p)
            <x-post-item :post="$p" />
        @endforeach
    </div>
@endsection
