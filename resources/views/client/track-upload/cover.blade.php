<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<label for="trackUpload-cover">
    <img
        id="trackUpload-cover-display"
        src="{{ $newTrack->cover ? $newTrack->cover->temporaryUrl() : Storage::url("img/default/track.png") }}"
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
<x-form.error-field name="newTrack.cover" />

<input
    id="trackUpload-cover"
    type="file"
    accept=".png, .jpg, .jpeg"
    class="file-input file-input-bordered file-input-sm"
    wire:model="newTrack.cover"
    name="cover"
    @change="
    $wire.$dispatch('file-uploading');
    $wire.$dispatch('new-toast',{message:'Uploading your cover image',type:'persist',name:'uploading-cover'})
    "
    hidden
/>
