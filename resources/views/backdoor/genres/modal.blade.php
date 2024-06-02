<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<x-form.modal id="genreModal">
    <x-slot name="title">Add New Genre</x-slot>

    {{-- LOGIN NAME --}}
    <x-form.input-inline name="form.username" placeholder="username" required>
        <x-svg.hashtag />
    </x-form.input-inline>

    {{-- PASSWORD --}}
    <x-form.input-inline
        name="form.password"
        type="password"
        placeholder="Password"
        required
        autocomplete
    >
        <x-svg.key />
    </x-form.input-inline>
</x-form.modal>
