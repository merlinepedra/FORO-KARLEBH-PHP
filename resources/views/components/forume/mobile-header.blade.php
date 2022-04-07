  <div class="md:hidden">
    <div class="flex justify-between">
      <div class="flex">
        <button class="text-blue-900">
          <svg class="mr-2 text-blue-600 w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 7V17M9 10V14M6 8V16M3 11V13M15 4V20M18 9V15M21 11V13" 
            stroke="#1e3a8a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <a href="{{ route('post.index') }}">
          <h1 class="text-lg font-bold"><span class="dark:text-gray-300">foru</span><span class="text-blue-900">me</span></h1>
        </a>
      </div>

      <div class="flex items-center">

        @guest
        <div>
          <a href="{{ route('login') }}" class="text-gray-700 mr-4 dark:text-gray-300">login</a>
        </div>
        @endguest

        <dark-light-mode class="mr-4 hidden sm:block align-baseline"></dark-light-mode>

        <button v-on:click="searchBoxOpen = !searchBoxOpen">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-current mr-4">
            <g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
          </button>

          @auth
          <a href="{{ route('notifications') }}" class="">
            <span class="relative">
              <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current w-6 h-6 mr-4 relative">
                <g><path d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"></path></g></svg>
                <span class="text-blue-100 text-[.55rem] absolute -top-1 left-3 bg-blue-900 py-[.5] px-1 rounded-full">
                  @if(auth()->user()->unreadNotifications()->count() > 0)
                  <notification-counter :count="{{ auth()->user()->unreadNotifications()->count() }}"></notification-counter>
                  @endif
                </span>
              </span>
            </a>
            @endauth

            @if(request()->is('admin/*'))

            <button v-on:click="toggleAdminMobileMenu">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path v-if="!adminMobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path v-if="adminMobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>

            @else

            <button v-on:click="mobileNav = !mobileNav">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path v-if="!mobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path v-if="mobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>

            @endif

          </div>
        </div>

        <div class="mt-4 mb-2" v-if="searchBoxOpen">
          <search-drop-down></search-drop-down>
        </div>

        {{--  --}}
        <nav v-if="mobileNav" class="flex flex-col text-gray-600 dark:text-gray-200">

          <a href="{{ route('post.create') }}">
            <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center">
              <span class="text-xl">+</span>
              <span class="ml-2">Start a New Topic</span>
            </div>
          </a>

          <a href="{{ route('post.index') }}" class="mb-1 text-sm">
            <div class="py-1 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('post.index')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
            </svg>
            Explore Topics
          </div>
        </a>

        <a href="{{ route('user.posts') }}" class="mb-1 text-sm">
          <div class="py-1 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('user.posts')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg> 
          My Topics
        </div>
      </a>

      <a href="{{ route('my-comments') }}" class="mb-1 text-sm">
        <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('my-comments')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
          <svg class="w-6 h-6 mr-2 ml-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
          </svg>
          My Answers
        </div>
      </a>

      <a href="{{ route('category.index') }}" class="mb-1 text-sm">
        <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('category.index')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
        </svg>
        Categories
      </div>
    </a>

    @auth
    @if(auth()->user()->isAdmin())
    <a href="{{ route('admin.home') }}" class="mb-1 text-sm">
      <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('admin.home')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
       <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 ml-5"  fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
      </svg>
      Admin
    </div>
  </a>
  @endif


  <a href="{{ route('setting.index') }}" class="mb-1">
    <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('setting.index')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
     <svg class="w-6 h-6 mr-2 ml-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stl-text-grey-400 stl-ml-[-3px]"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
     Settings
   </div>
 </a>
 @endauth

 <a href="{{ route('users') }}" class="mb-1 text-sm">
  <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('users')) dark:text-gray-500 bg-blue-100 border-blue-900 @endif">
   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
  </svg>
  All Users
</div>
</a>

<hr class="my-2 bg-gray-400">

<div class="">
  <div class="flex items-center">
    @auth
    <img 
    @if(auth()->user()->profile->file) 
    src="/storage/uploads/{{ auth()->user()->profile->file->file }}" 
    @else src="/image-header.jpg" @endif
    class="w-8 h-8 object-center object-cover rounded-full mr-4">
    <p>{{ auth()->user()->name }}</p>
    @endauth
  </div>

  @auth
  <div  class="text-sm italic py-2">
    <a class="block mt-1 hover:bg-blue-100 px-2 py-1" href="{{ route('profile.edit', auth()->user()->profile->name) }}">Edit Profile</a>
    <a class="block mt-1 hover:bg-blue-100 px-2 py-1" href="{{ route('profile.show', auth()->user()->profile->name) }}">
      View Profile
    </a>
    <form action="{{ route('logout') }}" method="post" class="inline">
      @csrf
      <button type="submit" class="font-semibold text-left mt-1 hover:bg-blue-100 px-2 py-1 w-full italic">Logout</button>
    </form>
  </div>
  @endauth

  <dark-light-mode class="ml-2 sm:hidden"></dark-light-mode>
</div>

</nav>

</div>
