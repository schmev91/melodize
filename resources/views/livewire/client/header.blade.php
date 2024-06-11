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
                            class="rounded-lg bg-primary stroke-white px-4 py-1"
                        >
                            <x-svg.wrench class="size-6" />
                        </a>
                    @endif

                    <button
                        type="button"
                        class="rounded-lg bg-primary px-4 py-1"
                    >
                        <x-svg.upload class="stroke-white" />
                    </button>

                    <div id="user" class="flex items-center">
                        @include("client.header.user-dropdown")
                    </div>
                @endauth

                @guest
                    @include("client.header.auth-buttons")
                @endguest
            </div>
        </div>
        {{-- END - HEADER INNER --}}
    </div>
</header>
