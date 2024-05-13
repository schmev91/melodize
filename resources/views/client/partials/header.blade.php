<header class="bg-white">
    <div class="container py-2 flex justify-between items-center ">
        <div class="header-left flex gap-5">
            <a href="">
                <img class="h-8" src="{{ asset('img/utils/melodize.png') }}" alt="">
            </a>

            <div class="header-search flex">
                <input id="search" type="text" placeholder="search for artist, album or track"
                    class="py-1 px-2 bg-gray-200 w-80 max-h-10 border-none placeholder:text-sm focus:ring-0">
                <a href="" class="p-1 my-auto bg-gray-200 stroke-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </a>
            </div>

            <div class="header-nav flex gap-4 items-center">
                <x-header-link :route="route('client.home')">Home</x-header-link>
                <x-header-link :route="route('client.albums')">Albums</x-header-link>
                <x-header-link :route="route('client.artists')">Artists</x-header-link>
                <x-header-link :route="route('client.tracks')">Tracks</x-header-link>
            </div>
        </div>

        <div class="header-right flex gap-2">
            <a href=""
                class="py-1 px-2 font-medium rounded-md transition-all duration-300 hover:-translate-y-0.5 bg-slate-500 text-white">Sign
                up</a>
            <a href=""
                class="py-1 px-2 font-medium rounded-md transition-all duration-300 hover:-translate-y-0.5 border border-slate-500">Login</a>
        </div>
    </div>
</header>
