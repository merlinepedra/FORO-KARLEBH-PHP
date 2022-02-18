  <div class="md:hidden">
    <div class="flex justify-between">
      <div class="flex">
        <svg class="mr-2 fill-current text-blue-600" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 7V17M9 10V14M6 8V16M3 11V13M15 4V20M18 9V15M21 11V13" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h1 class="text-lg font-bold">foru<span class="text-blue-900">me</span></h1>
      </div>

      <div class="flex items-center">
        <button v-on:click="searchBoxOpen = !searchBoxOpen">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-current mr-4"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
        </button>

        <span>
          <a href="{{ route('notifications') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current w-6 h-6 mr-4 relative">
              <g><path d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"></path></g></svg>
              <span class="text-gray-100 text-[.55rem] absolute -top-1 -right-1 bg-gray-900 py-[.5] px-1 rounded-full">
                @if(auth()->user()->unreadNotifications()->count() > 0)
                <notification-counter :count="{{ auth()->user()->unreadNotifications()->count() }}"></notification-counter>
                @endif
              </span>
            </a>
          </span>

          <button v-on:click="mobileNav = !mobileNav">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path v-if="!mobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              <path v-if="mobileNav" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>

        </div>
      </div>

      <div class="mt-4 mb-2" v-if="searchBoxOpen">
        <input type="text" placeholder="Search for topics" class="w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900" autofocus>
      </div>

      {{--  --}}
      <nav v-if="mobileNav" class="flex flex-col">

        <a href="{{ route('post.create') }}">
          <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center">
            <span class="text-xl">+</span>
            <span class="ml-2">Start a New Topic</span>
          </div>
        </a>

        <a href="{{ route('post.index') }}" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('post.index')) bg-blue-100 border-blue-900 @endif">
            <Explore class="w-7 h-7 mr-2 ml-5"></Explore>
            Explore Topics
          </div>
        </a>

        <a href="#" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(false) bg-blue-100 border-blue-900 @endif">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M24 29.3485C24 28.3722 24.7049 27.5385 25.6676 27.3763C27.7916 27.0183 30.1723 26.3473 32.2652 25.2485C35.3472 23.6303 38.0008 20.9633 38.0008 16.8447C38.0008 13.2074 36.2944 10.5064 33.7326 8.72515C31.2093 6.97066 27.8823 6.11808 24.5452 6.01149C21.2024 5.90472 17.7512 6.54254 14.9316 7.87372C12.1196 9.20135 9.81587 11.2827 9.03645 14.1214C8.89021 14.6539 9.20341 15.2042 9.73598 15.3505C10.2686 15.4967 10.8188 15.1835 10.9651 14.6509C11.5336 12.5804 13.272 10.869 15.7855 9.68229C18.2813 8.50395 21.4113 7.91241 24.4813 8.01047C27.5578 8.10874 30.4742 8.89549 32.5908 10.3672C34.6739 11.8156 36.0008 13.931 36.0008 16.8447C36.0008 19.9159 34.0809 22.0363 31.3355 23.4777C28.5988 24.9145 25.2495 25.5481 22.9432 25.6794C22.4139 25.7095 22 26.1475 22 26.6777V30C22 30.5523 22.4477 31 23 31C23.5523 31 24 30.5523 24 30V29.3485ZM23 37C21.8955 37 21 37.8954 21 39C21 40.1046 21.8955 41 23 41C24.1046 41 25 40.1046 25 39C25 37.8954 24.1046 37 23 37ZM34.8743 7.08308C37.9149 9.1972 40.0008 12.4839 40.0008 16.8447C40.0008 22.0099 36.6142 25.224 33.195 27.0192C30.8637 28.2432 28.2668 28.9664 26 29.3485V30C26 31.6568 24.6569 33 23 33C21.3432 33 20 31.6568 20 30V26.6777C20 25.0871 21.2415 23.773 22.8296 23.6826C24.9482 23.562 27.996 22.9722 30.4058 21.7069C32.7869 20.4568 34.0008 18.8909 34.0008 16.8447C34.0008 14.6496 33.0491 13.1219 31.4491 12.0093C29.7386 10.82 27.2324 10.0994 24.4175 10.0095C21.6204 9.92011 18.8116 10.4653 16.6394 11.4909C14.4343 12.5319 13.2533 13.8706 12.8937 15.1805C12.455 16.7782 10.8041 17.7178 9.20643 17.2791C7.60871 16.8404 6.66913 15.1895 7.10783 13.5918C8.09817 9.98502 10.9672 7.53373 14.0778 6.06516C17.2212 4.58109 20.9936 3.89703 24.609 4.01251C28.2067 4.12742 31.9442 5.04572 34.8743 7.08308ZM19 39C19 36.7909 20.7909 35 23 35C25.2092 35 27 36.7909 27 39C27 41.2091 25.2092 43 23 43C20.7909 43 19 41.2091 19 39Z" fill="#333333"/>
            </svg>
            My Topics
          </div>
        </a>

        <a href="#" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(false) bg-blue-100 border-blue-900 @endif">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            My Answers
          </div>
        </a>

        <a href="{{ route('category.index') }}" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('category.index')) bg-blue-100 border-blue-900 @endif">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            Categories
          </div>
        </a>

        @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.home') }}" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('admin.home')) bg-blue-100 border-blue-900 @endif">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            Admin
          </div>
        </a>
        @endif

        <a href="{{ route('users') }}" class="mb-1 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('users')) bg-blue-100 border-blue-900 @endif">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            All Users
          </div>
        </a>

        <hr class="my-2 bg-gray-400">

        <div class="">
          <div class="flex items-center">
            <img 
            @if(auth()->user()->profile->file) 
            src="/storage/uploads/{{ auth()->user()->profile->file->file }}" 
            @else src="/image-header.jpg" @endif
            class="w-8 h-8 object-center object-cover rounded-full mr-4" alt="Profile Picture">
            <p>{{ auth()->user()->name }}</p>
          </div>

          <div  class="text-gray-800 py-4">
            <a class="block mt-3 hover:bg-blue-100 px-2 py-2" href="{{ route('profile.edit', auth()->user()->profile->name) }}">Edit Profile</a>
            <a class="block mt-3 hover:bg-blue-100 px-2 py-2" href="{{ route('profile.show', auth()->user()->profile->name) }}">
              {{ auth()->user()->profile->name }}</a>
              <form action="{{ route('logout') }}" method="post" class="inline">
                @csrf
                <button type="submit" class="font-semibold text-left mt-3 hover:bg-blue-100 px-2 py-2 w-full">Logout</button>
              </form>
            </div>

            <button id="switch" class="flex-shrink-0 rounded-full h-6 w-6 bg-lime-300 border mr-10"></button>
          </div>

        </nav>

      </div>
