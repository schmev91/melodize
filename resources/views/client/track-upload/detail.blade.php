<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
<x-form.input-inline
    name="newTrack.title"
    placeholder="Title"
    required
></x-form.input-inline>
<x-form.input-inline
    name="newTrack.artist"
    placeholder="Artist"
    required
></x-form.input-inline>
<x-form.textarea name="description" placeholder="Description"></x-form.textarea>
<div class="flex flex-col gap-1">
    <label for="trackUpload-audio">Audio (mp3, flac, m4a, wav)</label>
    <input
        id="trackUpload-audio"
        wire:model="newTrack.audio"
        name="newTrack.audio"
        accept=".mp3, .wav, .flac, .m4a"
        type="file"
        class="file-input file-input-bordered file-input-sm"
        required
        @change="
        $wire.$dispatch('file-uploading');
        $wire.$dispatch('new-toast',{message:'Uploading your track',type:'persist',name:'uploading-cover'})
        "
    />
    <x-form.error-field name="newTrack.audio" />
</div>
