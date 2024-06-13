<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<label for="trackUpload-cover">
    <img
        id="trackUpload-cover-display"
        src="{{ Storage::url("img/default/track.png") }}"
        class="h-36 w-36 rounded-md object-cover"
        alt=""
    />
</label>
<label
    for="trackUpload-cover"
    class="btn btn-sm bg-wall bg-opacity-50 text-white"
>
    <x-svg.image class="size-4" />
    cover
</label>
<x-form.error-field name="newTrack.coverImg" />

<input
    id="trackUpload-cover"
    type="file"
    accept=".png, .jpg, .jpeg"
    class="file-input file-input-bordered file-input-sm"
    name="cover"
    hidden
/>
<script type="module">
    document
        .getElementById('trackUpload-cover')
        .addEventListener('change', function () {
            const fileInput = document.getElementById('trackUpload-cover');
            const previewImg = document.getElementById(
                'trackUpload-cover-display',
            );

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
</script>
