<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icon (require owenvoke/blade-fontawesome https://blade-ui-kit.com/blade-icons?set=9#search) -->

        <!-- CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- JS -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <title>{{ env("APP_NAME") }} - @yield("title")</title>
    </head>

    <body class="mx-10 bg-cyan-800 text-white">
        <!-- Menu -->

        <!-- Content -->
        <div class="h-full">
            @yield('content')
        </div>
    </body>

    <!-- livewire JS -->
    @livewireScripts
</html>
