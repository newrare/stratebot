<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icon Svg (require owenvoke/blade-fontawesome https://blade-ui-kit.com/blade-icons?set=9#search) -->

        <!-- CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet" />

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/umbrellajs"></script>
        <script src="{{ asset('main.js') }}"></script>

        <title>{{ env("APP_NAME") }} - @yield("title")</title>
    </head>

    <body class="mx-10 bg-cyan-800 text-white">
        <div id=showSuccess class="hidden">
            <x-alert type="success" message="Success" />
        </div>

        <div id=showError class="hidden">
            <x-alert type="error" message="Error" />
        </div>

        <!-- Menu -->

        <!-- Content -->
        <div class="h-full">
            @yield('content')
        </div>
    </body>
</html>
