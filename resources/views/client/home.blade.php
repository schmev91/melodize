@extends("components.layouts.client")

@section("content")
    <section class="mb-5">
        @include("client.home.userUploaded")
    </section>
    @vite("resources/dist/js/page/home.js")
@endsection
