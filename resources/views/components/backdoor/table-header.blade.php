<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@props([
    "title"=>"Table header"
])
<header class="flex items-center justify-between">
    <div class="prose flex gap-3">
        <h1 class="prose-h3: m-0 text-white">{{ $title }}</h1>
        <button class="btn btn-primary">Add +</button>
    </div>
    <x-form.input-inline
        name="search_keywords"
        class=""
        placeholder="Search"
    >
        <x-svg.glass />
    </x-form.input-inline>
</header>