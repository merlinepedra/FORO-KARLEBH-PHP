<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<div id="main">

  <body class="antialiased">
    <header class="px-6 pt-6 pb-3  bg-white dark:bg-gray-700 dark:text-gray-100 shadow-md relative">
      <div class="max-w-7xl font-semibold mx-auto">
        <x-forume.mobile-header/>
        @include('components.forume.desktop-header')
      </div>
    </header>
    <clip-design></clip-design>

    <div class="relative flex items-top justify-center min-h-[85vh] bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
          <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
            @yield('code')
          </div>

          <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
            @yield('message')
          </div>
        </div>
      </div>
    </div>
  </body>
</div>
</html>
