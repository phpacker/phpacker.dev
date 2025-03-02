@props([
    'title' => 'phpacker',
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="group/html"
>
    <head>
        <x-analytics />

        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        />

        <title>{{ $title }}</title>

        <!-- Icons -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/favicon/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/favicon/favicon-16x16.png"
        />

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

    <body {{ $attributes->merge(['class' => 'min-h-screen bg-white dark:bg-zinc-800']) }}>
        <div class="fixed top-4 right-4 hidden lg:block">
            <x-darkmode />
        </div>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
