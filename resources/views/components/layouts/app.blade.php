<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="{{ asset("favicon-hypergreen.ico") }}" />

        @vite("resources/css/output.css")
        @vite("resources/css/global.css")

        <title>{{ $title ?? "Page Title" }}</title>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jsmediatags/3.9.5/jsmediatags.min.js"
            integrity="sha512-YsR46MmyChktsyMMou+Bs74oCa/CDdwft7rJ5wlnmDzMj1mzqncsfJamEEf99Nk7IB0JpTMo5hS8rxB49FUktQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
    </head>

    <body class="position-relative">
        {{ $slot }}
    </body>
    @livewire("music-player")
</html>
