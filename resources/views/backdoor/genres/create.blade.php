<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<x-form.modal
    id="genreCreate"
    action="store"
    btnText="Create"
    btnType="success"
>
    <x-slot name="title">Add New Genre</x-slot>

    {{-- NAME --}}
    <x-form.input name="name" required>Genre name</x-form.input>
</x-form.modal>
