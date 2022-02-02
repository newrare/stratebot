<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://cdn.tailwindcss.com"></script>

        <title>{{ env("APP_NAME") }} - @yield("title")</title>
    </head>

    <body class="mx-10 bg-cyan-800 text-white">
        <!-- Menu -->

        <!-- Content -->
        <div class="h-full">
            @yield('content')
        </div>
    </body>
</html>
