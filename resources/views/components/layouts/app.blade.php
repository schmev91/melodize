<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="{{ asset("favicon-hypergreen.ico") }}" />

        @vite("public/dist/css/output.css")
        @vite("resources/css/global.css")

        <title>{{ $title ?? "Page Title" }}</title>

        <script>
            var exports = {};
        </script>
    </head>

    <body class="position-relative z-0 overflow-x-hidden">
        <div
            class="flex max-h-screen min-h-screen flex-col justify-between overflow-y-scroll bg-wall"
        >
            <livewire:client.header />

            {{ $slot }}

            @once
                {{-- theme --}}
                <input
                    type="checkbox"
                    class="theme-controller hidden"
                    value="melodize"
                    checked
                />
                <x-client.footer />
            @endonce
        </div>
        @persist("visualizeCanvas")
            <canvas
                id="visualize-canvas"
                class="absolute left-0 top-0"
            ></canvas>
            @include("toast")
        @endpersist('visualizeCanvas')

        @guest
            @livewire("auth.register")
            @livewire("auth.login")
        @endguest

        @auth
            @livewire("client.profile")
            @livewire("client.track-upload")
        @endauth
    </body>

    @persist("music-player")
        @livewire("music-player")
        @vite("public/dist/js/music-player/index.js")
    @endpersist('music-player')

    @vite("resources/js/addons.js")
</html>
