<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="{{ asset("favicon-hypergreen.ico") }}" />

        @vite("resources/css/output.css")
        @vite("resources/css/global.css")

        <title>{{ $title ?? "Page Title" }}</title>

        <x-script.jsmediatags />
    </head>

    <body class="position-relative overflow-x-hidden">
        {{ $slot }}
        <canvas id="visualize-canvas" class="absolute left-0 top-0"></canvas>
    </body>
    @livewire("music-player")
</html>
