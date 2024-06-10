<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<header
    class="container sticky top-0 z-20 bg-zinc-700 shadow-md shadow-zinc-700"
>
    <div class="header flex items-center">
        {{-- START - HEADER INNER --}}
        <a href="" class="header-logo bg-wall bg-opacity-50 px-2">
            @persist("header-logo")
                <img
                    class="h-12 py-1"
                    src="{{ asset("img/utils/melodize-logo-square.png") }}"
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

        @include("client.header.search")

        <div class="header-end flex-grow">
            <div id="profile" class="flex items-center justify-end gap-5">
                @auth
                    @php
                        $user = auth()->user();
                    @endphp

                    @if ($user->isAdmin)
                        <a
                            wire:navigate
                            href="{{ route("backdoor.dashboard") }}"
                        >
                            <x-svg.wrench
                                class="size-7 stroke-white hover:stroke-hypergreen"
                            />
                        </a>
                    @endif

                    <div id="user" class="flex items-center">
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
                    </div>
                @endauth

                @guest
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
                @endguest
            </div>
        </div>
        {{-- END - HEADER INNER --}}
    </div>
</header>
