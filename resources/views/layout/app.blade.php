<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SurStore')</title>
    <link rel="icon" href="{{ asset('storage/image/logo-surstore.png') }}">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
</head>

<body>
    <nav>
        @yield('navbar')
    </nav>

    <main>
        @yield('content')
    </main>

    <section>
        @yield('comment')
    </section>
</body>

</html>
