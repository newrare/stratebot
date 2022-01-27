<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://cdn.tailwindcss.com"></script>

        <title>{{ env("APP_NAME") }}</title>
    </head>

    <body class="min-h-screen bg-gray-600 flex flex-col justify-center">
        <div class="flex flex-row justify-center m-8">
            <img src="/stratebot.png" alt="{{ env('APP_NAME') }}" />
        </div>
    </body>
</html>
