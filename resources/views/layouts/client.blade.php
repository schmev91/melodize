<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab1</title>

    @vite('resources/css/bootstrap.min.css')
    @vite('resources/css/global.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

</head>

<body class="d-flex flex-column gap-3 justify-content-between" style="min-height: 100vh">
    {{-- HEADER --}}
    <header>
        @include('client.partials.header')
    </header>

    {{-- content - START --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- content - END --}}

    {{-- FOOTER --}}
    <footer>
        @include('client.partials.footer')
    </footer>

    @vite('resources/js/bootstrap.bundle.min.js')
</body>

</html>
