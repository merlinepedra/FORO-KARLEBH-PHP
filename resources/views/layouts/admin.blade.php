<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-200">
  <div id="main" v-cloak>
    <header class="p-6 bg-gray-100 shadow-sm dark:bg-gray-700 dark:text-gray-100">
    
      <div class="max-w-7xl font-semibold mx-auto">
        <x-forume.mobile-header/>
        @include('components.forume.desktop-header')
      </div>
    </header>

    <main class="font-sans antialiased mx-auto">
      <div class="mx-auto max-w-[1500px] grid md:grid-cols-5">

        <div class="bg-gray-400 w-auto md:min-h-[87.8vh] px-4 hidden md:block" id="adminMobileNav">
          <div class="grid my-7">
            <a href="{{ route('admin.home') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md @if(request()->routeIs('admin.home')) bg-gray-800 text-gray-100 @endif">Overview</a>
            <a href="{{ route('admin.makeAdmin.create') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.makeAdmin.create')) bg-gray-800 text-gray-100 @endif">Users</a>
            <a href="{{ route('admin.posts') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.posts')) bg-gray-800 text-gray-100 @endif">Posts</a>
            <a href="{{ route('admin.comments') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.comments')) bg-gray-800 text-gray-100 @endif">Comment</a>
            <a href="{{ route('admin.categories') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.categories')) bg-gray-800 text-gray-100 @endif">Categories</a>

            @yield('links')
          </div>
        </div>

        {{--  --}}
        <div class="bg-gray-200 w-auto p-4 mt-3 md:col-span-4 grid gap-7">
          @yield('content')
        </div>
      </div>

    </main>
  </div>
  <script>
    let theme = localStorage.getItem('theme')
    let htmlClasses = document.querySelector('html').classList

    if (theme == 'dark') {
      htmlClasses.add('dark')
    } else {
      htmlClasses.remove('dark')
    }

    document.getElementById('switch')
    .addEventListener('click', () => {
      htmlClasses.toggle('dark')

      if (localStorage.hasOwnProperty('theme')) {
        localStorage.removeItem('theme')
      } else {
        localStorage.theme = 'dark'
      }
    })
  </script>
</body>
</html>
