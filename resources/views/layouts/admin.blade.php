<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forume - Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.matchMedia('(prefers-color-scheme: dark)')
            .addEventListener('change', e => {
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

        updateTheme()
    </script>

    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-200 dark:bg-gray-800 min-h-screen">
    <div id="main" v-cloak>
        <header class="px-2 sm:px-4 md:px-6 pt-6 pb-3 bg-gray-100 dark:bg-gray-800 dark:text-gray-100 shadow-md relative">
            <div class="max-w-7xl font-semibold mx-auto">
                <x-forume.mobile-header />
                @include('components.forume.desktop-header')
            </div>
        </header>
        <main class="font-sans antialiased max-w-7xl mx-auto px-2 sm:px-4 md:px-6 flex pt-8">
            <div class="flex-grow">
                <div class="mx-auto max-w-[1600px] grid md:grid-cols-5">
                    <div class="md:pr-4 lg:pr-6 hidden md:block" id="adminMobileNav">
                        <div class="grid">
                            <!-- dark:bg-zinc-500 -->
                            <a href="{{ route('admin.home') }}" class="font-semibold bg-gray-400 px-5 py-3 rounded-md @if (request()->routeIs('admin.home')) bg-zinc-500 text-gray-100 @endif">Overview</a>
                            <a href="{{ route('admin.makeAdmin.create') }}" class="font-semibold bg-gray-400 px-5 py-3 rounded-md mt-4 @if (request()->routeIs('admin.makeAdmin.create')) bg-zinc-500 text-gray-100 @endif">Users</a>
                            <a href="{{ route('admin.posts') }}" class="font-semibold bg-gray-400 px-5 py-3 rounded-md mt-4 @if (request()->routeIs('admin.posts')) bg-zinc-500 text-gray-100 @endif">Posts</a>
                            <a href="{{ route('admin.comments') }}" class="font-semibold bg-gray-400 px-5 py-3 rounded-md mt-4 @if (request()->routeIs('admin.comments')) bg-zinc-500 text-gray-100 @endif">Comment</a>
                            <a href="{{ route('admin.categories') }}" class="font-semibold bg-gray-400 px-5 py-3 rounded-md mt-4 @if (request()->routeIs('admin.categories')) bg-zinc-500 text-gray-100 @endif">Categories</a>

                            @yield('links')
                        </div>
                    </div>

                    {{-- --}}
                    <div class="w-auto md:col-span-4 grid gap-7">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>

</html>