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
      <div class="max-w-6xl mx-auto font-semibold flex items-center">
        <a href="{{ route('post.create') }}" class="mr-10">Create Post</a>

        <button id="switch" class="flex-shrink-0 rounded-full h-6 w-6 bg-lime-300 border mr-10"></button>

        @auth
        <form action="{{ route('logout') }}" method="post" class="mr-10">
          @csrf
          <button type="submit" class="font-semibold">Logout</button>
        </form>

        <a href="" class="mr-10">Admin</a>

        <a href="{{ route('users') }}" class="mr-10">Users</a>

        @else
        <a href="\login" class="mr-10">Login</a>
        @endauth

        @auth
        <a href="{{ route('notifications') }}">
          <button class="w-8 h-8 mr-10 relative">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current"><g><path d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"></path></g></svg>
            <span class="text-gray-100 text-xs absolute top-0 -right-1 bg-gray-900 py-[.5] px-1 rounded-full">
              @if(auth()->user()->unreadNotifications()->count() > 0)
              <notification-counter :count="{{ auth()->user()->unreadNotifications()->count() }}"></notification-counter>
              @endif
            </span>
          </button>
        </a>
        @endauth

        <a href="{{ route('post.index') }}" class="mr-10">Posts</a>

        <div class="relative w-1/2">
          <button class="font-semibold" v-on:click="megaMenu = !megaMenu">Categories</button>
          <transition name="flip">
            <div v-if="megaMenu" id="mega-menu" class="text-black absolute right-[41%] bg-lime-300 p-4 mt-3 w-full top-9 z-10 grid grid-cols-2">
              <div class="">
                @foreach(\App\Models\Category::all() as $category)
                <a class="block" href="{{ route('category.show', $category) }}">{{ ucfirst($category->name) }}</a>
                @endforeach
              </div>

              <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus rem reprehenderit facilis sapiente nobis beatae repellat at ut nesciunt unde, qui similique debitis adipisci voluptas vitae doloremque ea optio sint.</div>

              <div class="col-span-2 text-center mt-3 pt-3 border-t border-dashed border-gray-800"><a href="{{ route('category.create') }}">Create a Category!</a></div>
            </div>
          </transition>
        </div>

        @auth
        <div class="relative flex-shrink-0">
          <button v-on:click="profileMenu = !profileMenu">
            @if(auth()->user()->profile->file)
            <img src="/storage/uploads/{{ auth()->user()->profile->file->file }}" 
            class="w-8 h-8 object-center object-cover rounded-full border-2 border-gray-900" alt="Profile Picture">
            @else
            <img src="/image-header.jpg" class="w-8 h-8 object-center object-cover rounded-full" alt="Profile Picture">
            @endif
          </button>

          <transition name="flip">
            <div v-if="profileMenu" id="profile-menu" class="text-black absolute right-0 bg-lime-300 py-4 mt-5 z-10 w-48 text-center">
              <a v-on:click="profileMenu = false" class="block mt-3 hover:bg-lime-400 px-2 py-2" href="{{ route('profile.edit', auth()->user()->profile->name) }}">Edit Profile</a>
              <a v-on:click="profileMenu = false" class="block mt-3 hover:bg-lime-400 px-2 py-2" href="{{ route('profile.show', auth()->user()->profile->name) }}">
              {{ auth()->user()->name }}</a>
              <a v-on:click="profileMenu = false" class="block mt-3 hover:bg-lime-400 px-2 py-2" href="">Logout</a>
            </div>
          </transition>
        </div>
        @endauth

      </div>
    </header>

    <main class="font-sans antialiased mx-auto">
      <div class="mx-auto max-w-[1500px] grid grid-cols-5">
        <div class="bg-gray-400 w-auto min-h-screen px-4">
          <div class="grid mt-7">
            <a href="{{ route('admin.home') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md @if(request()->routeIs('admin.home')) bg-gray-800 text-gray-100 @endif">Mail User</a>
            <a href="{{ route('admin.settings') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.settings')) bg-gray-800 text-gray-100 @endif">Setings</a>
            <a href="{{ route('admin.makeAdmin.create') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.makeAdmin.create')) bg-gray-800 text-gray-100 @endif">Users</a>
            <a href="{{ route('admin.posts') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.posts')) bg-gray-800 text-gray-100 @endif">Posts</a>
            <a href="{{ route('admin.comments') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.comments')) bg-gray-800 text-gray-100 @endif">Comment</a>
            <a href="{{ route('admin.categories') }}" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 @if(request()->routeIs('admin.categories')) bg-gray-800 text-gray-100 @endif">Categories</a>

            @yield('links')
          </div>
        </div>

        {{--  --}}
        <div class="bg-gray-200 w-auto min-h-screen col-span-4 p-4 mt-3">
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
