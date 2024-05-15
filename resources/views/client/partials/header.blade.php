<header class="z-50">
    <div class="navbar bg-base-100 h-fit p-0">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16"
                        />
                    </svg>
                </div>
                <ul
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow"
                >
                    <li>
                        <a href="{{ route("client.home") }}">Home</a>
                    </li>
                    <li><a>Item 3</a></li>
                    <li>
                        <a>Parent</a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <a class="btn btn-ghost">
                <img
                    class="h-7"
                    src="{{ asset("img/utils/melodize-white.png") }}"
                />
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal gap-2 px-1">
                <x-nav-item :route="route('client.home')">Home</x-nav-item>
                <x-nav-item :route="route('client.albums')">Albums</x-nav-item>
                <x-nav-item :route="route('client.artists')">
                    Artists
                </x-nav-item>
                <x-nav-item :route="route('client.tracks')">Tracks</x-nav-item>
                <li
                    @class(["rounded-md bg-slate-300 text-slate-800" => Route::is("client.posts*")])
                >
                    <details>
                        <summary>Posts</summary>
                        <ul class="p-2 text-white">
                            {{-- START - DROPDOWN ITEM --}}
                            <li>
                                <a
                                    class="text-nowrap"
                                    href="{{ route("client.posts.mostviewed") }}"
                                >
                                    Most viewed
                                </a>
                            </li>
                            {{-- END - DROPDOWN ITEM --}}
                            {{-- START - DROPDOWN ITEM --}}
                            <li>
                                <a
                                    class="text-nowrap"
                                    href="{{ route("client.posts.newest") }}"
                                >
                                    Newest
                                </a>
                            </li>
                            {{-- END - DROPDOWN ITEM --}}
                            {{-- START - DROPDOWN ITEM --}}
                            <li>
                                <a
                                    class="text-nowrap"
                                    href="{{ route("client.posts.type") }}"
                                >
                                    Type
                                </a>
                            </li>
                            {{-- END - DROPDOWN ITEM --}}
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
            </button>
        </div>
    </div>
</header>
