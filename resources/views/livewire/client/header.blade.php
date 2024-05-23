<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<header class="container sticky top-0 bg-zinc-700">
    <div class="header flex items-center">
        {{-- START - HEADER INNER --}}
        <a href="" class="header-logo bg-wall bg-opacity-50 px-2">
            @persist("header-logo")
                <img
                    class="h-12 py-3"
                    src="{{ asset("img/utils/melodize-hypergreen.png") }}"
                    alt=""
                />
            @endpersist("header-logo")
        </a>

        <nav class="flex h-12 items-center" wire:click="$refresh">
            @foreach ($route_names as $key => $name)
                @php
                    $display = $name;
                    $name = "client." . $name;
                @endphp

                <x-nav-item :$key :$name :active="$active_name === $name">
                    {{ ucfirst($display) }}
                </x-nav-item>
            @endforeach
        </nav>

        <div id="search" class="relative ms-6">
            <input
                type="text"
                placeholder="Swearch UwO?"
                class="form-input h-8 w-96 rounded-md bg-slate-200"
            />
            <span class="absolute right-2 top-1/2 -translate-y-1/2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6 stroke-slate-600"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
            </span>
        </div>

        <div class="header-end flex flex-grow items-center justify-end gap-5">
            <div id="profile">
                <div id="auth" class="flex gap-4">
                    <button
                        class="rounded-md bg-white px-2 py-1 font-medium text-wall"
                        onclick="login_modal.showModal()"
                    >
                        Login
                    </button>
                    <button
                        class="rounded-md px-2 py-1 font-medium text-hypergreen outline outline-1 outline-hypergreen"
                        onclick="register_modal.showModal()"
                    >
                        Register
                    </button>
                </div>
            </div>
        </div>
        {{-- END - HEADER INNER --}}
    </div>
</header>
