<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GDMedia') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <div>
        <aside>
            <x-guru.sidebar />
        </aside>

        <main class="max-w-screen min-h-screen px-8 bg-abu-100 py-9">
            <div class="pl-72">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
