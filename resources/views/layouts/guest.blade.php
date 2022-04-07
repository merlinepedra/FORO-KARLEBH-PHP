<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script>
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
      if (localStorage.theme === 'system') {
        if (e.matches) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      }
    });

    function updateTheme() {
      if (!('theme' in localStorage)) {
        localStorage.theme = 'light';
      }

      switch (localStorage.theme) {
        case 'system':
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
        document.documentElement.setAttribute('color-theme', 'system');
        break;

        case 'dark':
        document.documentElement.classList.add('dark');
        document.documentElement.setAttribute('color-theme', 'dark');
        break;

        case 'light':
        document.documentElement.classList.remove('dark');
        document.documentElement.setAttribute('color-theme', 'light');
        break;
      }
    }

    updateTheme();
  </script>
  
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  <div id="main" class="font-sans text-gray-900 antialiased">
    <header class="p-6 bg-white dark:bg-gray-700 dark:text-gray-100 shadow-md">
      <div class="max-w-7xl font-semibold mx-auto">
        <x-forume.mobile-header/>
        @include('components.forume.desktop-header')
      </div>
    </header>

    {{ $slot }}
  </div>
</body>
</html>
