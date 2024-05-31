<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="{{ asset("favicon-hypergreen.ico") }}" />

        @vite("resources/dist/css/output.css")
        @vite("resources/css/global.css")

        <title>{{ $title ?? "Page Title" }}</title>

        <script>
            var exports = {};
        </script>

        <x-script.jsmediatags />
    </head>

    <body class="position-relative z-0 overflow-x-hidden">
        {{-- theme --}}
        <input
            type="checkbox"
            class="theme-controller hidden"
            value="melodize"
            checked
        />
        {{ $slot }}
        @persist("visualizeCanvas")
            <canvas
                id="visualize-canvas"
                class="absolute left-0 top-0"
            ></canvas>
        @endpersist('visualizeCanvas')
    </body>
    @livewire("music-player")
</html>
