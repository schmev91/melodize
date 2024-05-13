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
    {{-- HEADER --}}
    @include('client.partials.header')
    {{--
            content - START
        --}}
    <div class="container">
        <div class="bg-white rounded-md mt-5 p-2">
            @yield('content')
        </div>
    </div>
    {{-- content - END --}}
    {{-- FOOTER --}}
    @include('client.partials.footer')
</body>

</html>
