<div class="dropdown dropdown-end">
    <div tabindex="0" role="button">
        <img
            src="{{ Storage::url($user->avatar) }}"
            class="h-9 w-9 rounded-full object-cover"
            alt=""
        />
    </div>
    <ul
        tabindex="0"
        class="menu dropdown-content z-[1] mt-1 w-40 rounded-md bg-base-100 p-2 shadow"
    >
        <li>
            <button type="button" @click="profile_modal.show()">Profile</button>
            <button
                type="button"
                @click="$wire.$refresh()"
                wire:click="logout"
            >
                Logout
            </button>
        </li>
    </ul>
</div>
