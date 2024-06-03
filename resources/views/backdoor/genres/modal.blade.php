<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<x-form.modal id="genreModal">
    <x-slot name="title">Add New Genre</x-slot>
    <x-slot name="actionStore">{{ route("api.genre.store") }}</x-slot>

    {{-- NAME --}}
    <x-form.input name="name" required>Genre name</x-form.input>
</x-form.modal>
