<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->

@props([
    "title" => "Table header",
    "modalId" => "",
])
<header class="flex items-center justify-between">
    <div class="prose flex items-center gap-3">
        <h1 class="prose-h3: m-0 text-white">{{ $title }}</h1>
        <x-form.hyper-btn modalId="{{ $modalId }}" class="btn btn-primary">
            Add +
        </x-form.hyper-btn>

        @if (session("response_message"))
            {!! session("response_message") !!}
        @endif
    </div>
    <x-form.input-inline name="search_keywords" class="" placeholder="Search">
        <x-svg.glass />
    </x-form.input-inline>
</header>
