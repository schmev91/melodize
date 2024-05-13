<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>lab1</title>

    @vite('resources/css/output.css')
    @vite('resources/css/global.css')
</head>

<body class="bg-client bg-cover bg-no-repeat">


    <div class="container w-full flex gap-2 mt-5">
        <div class="admin-menu bg-white rounded-md flex flex-col gap-2">
            <div class="admin-logo pt-2 px-1">
                <a href="{{ route('client.home') }}">
                    <img src="{{ asset('img/utils/melodize.png') }}" class="h-6" alt="">
                </a>
            </div>
            <div class="flex flex-col gap-1 py-2">
                <x-admin.menu-item :route="route('admin.dashboard')">Dashboard</x-admin.menu-item>
                <x-admin.menu-item :route="route('admin.albums')">Albums</x-admin.menu-item>
                <x-admin.menu-item :route="route('admin.artists')">Artists</x-admin.menu-item>
                <x-admin.menu-item :route="route('admin.tracks')">Tracks</x-admin.menu-item>
            </div>
        </div>
        <div class="admin-content flex-grow">
            <div class="bg-white rounded-md  p-2">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- content - END --}}
    {{-- FOOTER --}}
    {{-- @include('client.partials.footer') --}}
</body>

</html>
