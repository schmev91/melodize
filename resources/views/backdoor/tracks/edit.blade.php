{{-- Nothing in the world is as soft and yielding as water. --}}
<x-form.modal
    id="trackEdit_modal"
    :action="route('api.tracks.update','1')"
    btn-text="Upload"
    enctype="multipart/form-data"
    isActionNormal="true"
>
    <x-slot name="title">Upload new track</x-slot>

    <div id="trackUpload-body" class="flex gap-6">
        <div id="uploadTrack-cover" class="flex flex-col items-center gap-2">
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
            @error("cover")
                <small class="error_holder mt-1 max-w-36 text-error">
                    {{ $message }}
                </small>
            @enderror

            <input
                id="trackUpload-cover"
                type="file"
                accept=".png, .jpg, .jpeg"
                class="file-input file-input-bordered file-input-sm"
                name="cover"
                hidden
            />
        </div>

        <div id="uploadTrack-details" class="flex w-72 flex-col gap-2">
            <input
                type="text"
                hidden
                name="user_id"
                value="{{ auth()->user()->id }}"
            />
            <x-form.input-inline
                name="title"
                placeholder="Title"
            ></x-form.input-inline>
            <x-form.input-inline
                name="artist"
                placeholder="Artist"
            ></x-form.input-inline>
            <x-form.textarea
                name="description"
                placeholder="Description"
            ></x-form.textarea>
            <div class="flex flex-col gap-1">
                <label for="trackUpload-audio">
                    Audio (mp3, flac, m4a, wav)
                </label>
                <input
                    id="trackUpload-audio"
                    {{-- wire:model="trackUploadForm.audio" --}}
                    name="audio"
                    accept=".mp3, .wav, .flac, .m4a"
                    type="file"
                    class="file-input file-input-bordered file-input-sm"
                    required
                />
                @error("trackUploadForm.audio")
                    <small class="error_holder mt-1 text-error">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</x-form.modal>
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
