<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PLNEOVLT</title>


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet"
    href="{{ asset('assets/fontawesome-free-6.7.2-web/fontawesome-free-6.7.2-web/js/all.min.js') }}">

  @stack('css')
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet"
    href="{{ asset('assets/fontawesome-free-6.7.2-web/fontawesome-free-6.7.2-web/css/all.min.css') }}">

  <style>
    .bg-particle {
      background: linear-gradient(90deg, rgba(37, 85, 133, 1) 0%, rgba(102, 76, 168, 1) 51%, rgba(191, 79, 232, 1) 100%);
      filter: blur(50px);
    }
  </style>
</head>

<body class="overflow-x-hidden font-sans antialiased bg-gray-200">

  {{-- <div class="absolute top-0 left-0 rounded-full -z-50 bg-particle opacity-40 w-60 h-60"></div>
  <div class="absolute rounded-full -bottom-10 -right-20 -z-50 bg-particle opacity-40 w-60 h-60"></div> --}}

  <main class="w-full h-full">
    {{ $slot }}
  </main>

  @stack('script')
</body>

</html>
