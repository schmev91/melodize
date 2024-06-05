<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
<x-form.modal id="genreEdit" action="update" btnText="Save" btnType="info">
    <x-slot name="title">Edit Genre</x-slot>

    <div id="edit-loading" class="flex justify-center">
        <span class="loading loading-bars loading-lg"></span>
    </div>
    <div id="edit-inputs" class="hidden">
        {{-- NAME --}}
        <x-form.input name="name" required>Genre name</x-form.input>
    </div>
</x-form.modal>

<script type="module">
    const inputs = document.querySelector('#genreEdit-inner #edit-inputs');
    const loading = document.querySelector('#genreEdit-inner #edit-loading');
    const hideClass = 'hidden';

    genreEdit.addEventListener('close', () => {
        inputs.classList.add(hideClass);
        loading.classList.remove(hideClass);
    });

    genreEdit.addEventListener('open', async ({ detail: { button } }) => {
        const target = button.getAttribute('target');
        const url = window.location.origin + `/api/genre/${target}`;
        await fetch(url)
            .then((r) => r.json())
            .then(({ name }) => {
                document.querySelector(
                    "#genreEdit-inner input[name='name']",
                ).value = name;
                loading.classList.add(hideClass);
                inputs.classList.remove(hideClass);
            });
    });
</script>
