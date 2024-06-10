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
        {{ $slot }}
        @persist("visualizeCanvas")
            <canvas
                id="visualize-canvas"
                class="absolute left-0 top-0"
            ></canvas>
        @endpersist('visualizeCanvas')
    </body>
    @persist("music-player")
        {{-- theme --}}
        <input
            type="checkbox"
            class="theme-controller hidden"
            value="melodize"
            checked
        />
        @livewire("music-player")
        @vite("public/dist/js/music-player/index.js")
    @endpersist('music-player')

    <script type="module">
        document.addEventListener('livewire:init', () => {
            console.log('livewire init successfully');
            Livewire.on('dialogCollapse', ({ id }) => {
                setTimeout(() => {
                    window[id].show();
                }, 100);
            });
        });
    </script>
</html>
