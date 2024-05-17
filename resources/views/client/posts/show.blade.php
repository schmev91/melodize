@extends("layouts.client")

@section("content")
    <section class="px-36">
        <div class="mb-5 overflow-hidden rounded-md bg-white">
            <div class="post-banner mb-10">
                <img
                    class="h-[16rem] w-full object-cover"
                    src="{{ asset($post->thumbnail) }}"
                    alt=""
                />
            </div>
            <article class="prose max-w-full px-20 pb-20">
                <h1 class="text-slate-800">{{ $post->title }}</h1>
                <p class="leading-10 text-base-100">
                    {!! $post->content !!}
                </p>
            </article>
        </div>
    </section>
@endsection
