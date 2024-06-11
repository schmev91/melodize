<!-- An unexamined life is not worth living. - Socrates -->
<form
    enctype="multipart/form-data"
    class="flex w-fit flex-col items-center gap-2"
    wire:submit="changeAvatar"
    method="POST"
>
    <input
        id="profileAvatar"
        wire:model="profile.avatarImg"
        name="profile.avatarImg"
        type="file"
        @change="isAvatarUploaded = true"
        hidden
    />
    <label for="profileAvatar" class="cursor-pointer">
        <img
            src="{{ $profile->avatarImg ? $profile->avatarImg->temporaryUrl() : Storage::url($user->avatar) }}"
            class="h-32 w-32 rounded-full object-cover"
            alt="avatar"
        />
    </label>
    <div class="flex gap-2">
        <label
            for="profileAvatar"
            class="label w-fit cursor-pointer gap-1 rounded-box bg-wall bg-opacity-50 px-2 py-0 text-white shadow-md"
        >
            <x-svg.image class="size-5 stroke-white" />
            change
        </label>
        <button
            x-show="isAvatarUploaded"
            class="rounded-box bg-info px-2 py-0 text-white"
            type="submit"
        >
            save
        </button>
    </div>
    @error("profile.avatarImg")
        <small class="error_holder mt-1 max-w-36 text-error">
            {{ $message }}
        </small>
    @enderror
</form>
