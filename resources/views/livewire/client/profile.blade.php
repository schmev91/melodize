{{-- Do your work, then step back. --}}
<x-form.modal-core id="profile_modal">
    <div class="w-[33vw] py-6">
        <div class="prose">
            <h1>Your profile</h1>
        </div>
        <div id="profile-body" class="flex justify-between py-3">
            <div
                class="profile-avatar flex flex-col justify-between"
                x-data="{ isAvatarUploaded: false }"
                @profile-updated.window="isAvatarUploaded = false"
            >
                <x-form.profile-input :$user name="username" label="Username" />
                @include("client.profile.avatar")
            </div>
            <div class="profile-info">
                <x-form.profile-input :$user name="name" label="Display name" />
                <x-form.profile-input :$user name="email" label="Email" />
                <x-form.profile-input
                    autocomplete="true"
                    :$user
                    name="password"
                    label="Password"
                    type="password"
                    placeholder="••••••"
                />
            </div>
        </div>
        {{-- end profile-body --}}
    </div>
</x-form.modal-core>
