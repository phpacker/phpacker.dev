@props([
    'title' => 'phpacker',
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="group/html"
>
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        />

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link
            rel="preconnect"
            href="https://fonts.bunny.net"
        />
        <link
            href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @fluxAppearance
    </head>

    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <div class="fixed top-4 right-4 hidden lg:block">
            <x-darkmode />
        </div>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
