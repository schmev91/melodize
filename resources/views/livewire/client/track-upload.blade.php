{{-- Nothing in the world is as soft and yielding as water. --}}
<x-form.modal id="trackUpload_modal" action="uploadTrack" btn-text="Upload">
    <x-slot name="title">Upload new track</x-slot>

    <div id="trackUpload-body" class="flex gap-6">
        <div id="uploadTrack-cover" class="flex flex-col items-center gap-2">
            @include("client.track-upload.cover")
        </div>

        <div id="uploadTrack-details" class="flex w-72 flex-col gap-2">
            @include("client.track-upload.detail")
        </div>
    </div>
</x-form.modal>
