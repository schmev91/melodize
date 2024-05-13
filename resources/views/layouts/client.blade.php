<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>lab1</title>

        @vite("resources/css/output.css")
    </head>

    <body class="">
        {{-- HEADER --}}
        @include("client.partials.header")
        {{--
            content - START
        --}}
        <div class="container">@yield("content")</div>
        {{-- content - END --}}
        {{-- FOOTER --}}
        @include("client.partials.footer")
    </body>
</html>
