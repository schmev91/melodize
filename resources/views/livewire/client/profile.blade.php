{{-- Do your work, then step back. --}}
<x-form.modal-core id="profile_modal">
    <div class="py-6">
        <div class="prose">
            <h1>Your profile</h1>
        </div>
        <div id="profile-body" class="flex gap-20 py-3">
            <div class="profile-avatar flex flex-col items-center gap-2">
                <input
                    id="profileAvatar"
                    wire:model="profile.avatar"
                    type="file"
                    hidden
                />
                <label for="profileAvatar" class="cursor-pointer">
                    <img
                        src="{{ Storage::url($user->avatar) }}"
                        class="h-32 w-32 rounded-full object-cover"
                        alt="avatar"
                    />
                </label>
                <label
                    for="profileAvatar"
                    class="label w-fit cursor-pointer gap-1 rounded-box bg-primary py-0 text-white"
                >
                    <x-svg.image class="size-5 stroke-white" />
                    change
                </label>
            </div>
            <div class="profile-info">
                <div class="field flex flex-col">
                    <label for="profile.username" class="label font-medium">
                        Username
                    </label>
                    <div class="flex gap-2" x-data="{ isEditing: false }">
                        <input
                            id="profile.username"
                            type="text"
                            class="input input-md input-bordered disabled:bg-slate-100"
                            value="{{ $user->username }}"
                            :disabled="!isEditing"
                        />
                        <button
                            x-show="!isEditing"
                            @click="isEditing = true"
                            type="button"
                            class="btn btn-neutral bg-wall bg-opacity-50"
                        >
                            <x-svg.pen class="size-4 stroke-white" />
                        </button>
                        <button
                            x-show="isEditing"
                            @click="isEditing = false"
                            type="button"
                            class="btn btn-info"
                        >
                            <x-svg.disk-save
                                class="size-4 stroke-white stroke-2"
                            />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-form.modal-core>
