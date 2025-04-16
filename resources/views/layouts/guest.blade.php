<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/fontawesome-free-6.7.2-web/fontawesome-free-6.7.2-web/js/all.min.js')}}">

        @stack('css')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex justify-center min-h-screen min-w-screen">

            <div class="flex flex-col justify-center h-full mt-10 min-w-[500px]">
                {{ $slot }}
            </div>
        </div>

        @stack('script')
    </body>
</html>
