{{-- Nothing in the world is as soft and yielding as water. --}}
<x-form.modal id="trackUpload_modal" btn-text="Upload">
    <x-slot name="title">Upload new track</x-slot>

    <div id="trackUpload-body" class="flex gap-6">
        <div id="uploadTrack-cover" class="flex flex-col items-center gap-2">
            <label for="trackUpload-cover">
                <img
                    src="{{ Storage::url("img/covers/シニカル・シニカル.jpg") }}"
                    class="h-36 w-36 rounded-md object-cover"
                    alt=""
                />
            </label>
            <label for="trackUpload-cover">
                <button class="btn btn-sm bg-wall bg-opacity-50 text-white">
                    <x-svg.image class="size-4" />
                    cover
                </button>
            </label>
            <input
                id="trackUpload-cover"
                type="file"
                accept=".png, .jpg, .jpeg"
                class="file-input file-input-bordered file-input-sm"
                hidden
            />
        </div>

        <div id="uploadTrack-details" class="flex w-72 flex-col gap-2">
            <x-form.input-inline
                name="trackUpload.title"
                placeholder="Title"
            ></x-form.input-inline>
            <x-form.input-inline
                name="trackUpload.artist"
                placeholder="Artist"
            ></x-form.input-inline>
            <x-form.textarea
                name="trackUpload.description"
                placeholder="Description"
            ></x-form.textarea>
            <div class="flex flex-col gap-1">
                <label for="trackUpload-audio">
                    Audio (mp3, flac, m4a, wav)
                </label>
                <input
                    id="trackUpload-audio"
                    accept=".mp3, .wav, .flac, .m4a"
                    type="file"
                    class="file-input file-input-bordered file-input-sm"
                />
            </div>
        </div>
    </div>
</x-form.modal>
