  <div class="md:hidden">
    <div class="flex justify-between">
      <div class="flex">
        <svg class="mr-2 fill-current text-blue-600" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 7V17M9 10V14M6 8V16M3 11V13M15 4V20M18 9V15M21 11V13" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <a href="{{ route('post.index') }}">
          <h1 class="text-lg font-bold">foru<span class="text-blue-900">me</span></h1>
        </a>
      </div>

      <div class="flex items-center">
        @guest
        <a href="{{ route('login') }}" class="text-gray-700 mr-4">Login</a>
        @endguest
        
        <button v-on:click="searchBoxOpen = !searchBoxOpen">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-current mr-4"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
        </button>

        @auth
        <a href="{{ route('notifications') }}">
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
      <nav v-if="mobileNav" class="flex flex-col text-gray-600">

        <a href="{{ route('post.create') }}">
          <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center">
            <span class="text-xl">+</span>
            <span class="ml-2">Start a New Topic</span>
          </div>
        </a>

        <a href="{{ route('post.index') }}" class="mb-1 hover:bg-gray-200 text-sm">
          <div class="py-1 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('post.index')) bg-blue-100 border-blue-900 @endif">
            <Explore class="w-6 h-6 mr-2 ml-5"></Explore>
            Explore Topics
          </div>
        </a>

        <a href="#" class="mb-1 hover:bg-gray-200 text-sm">
          <div class="py-1 inline-flex items-center w-full border-l-4 border-transparent @if(false) bg-blue-100 border-blue-900 @endif">
            <svg class="w-6 h-6 mr-2 ml-5" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M24 29.3485C24 28.3722 24.7049 27.5385 25.6676 27.3763C27.7916 27.0183 30.1723 26.3473 32.2652 25.2485C35.3472 23.6303 38.0008 20.9633 38.0008 16.8447C38.0008 13.2074 36.2944 10.5064 33.7326 8.72515C31.2093 6.97066 27.8823 6.11808 24.5452 6.01149C21.2024 5.90472 17.7512 6.54254 14.9316 7.87372C12.1196 9.20135 9.81587 11.2827 9.03645 14.1214C8.89021 14.6539 9.20341 15.2042 9.73598 15.3505C10.2686 15.4967 10.8188 15.1835 10.9651 14.6509C11.5336 12.5804 13.272 10.869 15.7855 9.68229C18.2813 8.50395 21.4113 7.91241 24.4813 8.01047C27.5578 8.10874 30.4742 8.89549 32.5908 10.3672C34.6739 11.8156 36.0008 13.931 36.0008 16.8447C36.0008 19.9159 34.0809 22.0363 31.3355 23.4777C28.5988 24.9145 25.2495 25.5481 22.9432 25.6794C22.4139 25.7095 22 26.1475 22 26.6777V30C22 30.5523 22.4477 31 23 31C23.5523 31 24 30.5523 24 30V29.3485ZM23 37C21.8955 37 21 37.8954 21 39C21 40.1046 21.8955 41 23 41C24.1046 41 25 40.1046 25 39C25 37.8954 24.1046 37 23 37ZM34.8743 7.08308C37.9149 9.1972 40.0008 12.4839 40.0008 16.8447C40.0008 22.0099 36.6142 25.224 33.195 27.0192C30.8637 28.2432 28.2668 28.9664 26 29.3485V30C26 31.6568 24.6569 33 23 33C21.3432 33 20 31.6568 20 30V26.6777C20 25.0871 21.2415 23.773 22.8296 23.6826C24.9482 23.562 27.996 22.9722 30.4058 21.7069C32.7869 20.4568 34.0008 18.8909 34.0008 16.8447C34.0008 14.6496 33.0491 13.1219 31.4491 12.0093C29.7386 10.82 27.2324 10.0994 24.4175 10.0095C21.6204 9.92011 18.8116 10.4653 16.6394 11.4909C14.4343 12.5319 13.2533 13.8706 12.8937 15.1805C12.455 16.7782 10.8041 17.7178 9.20643 17.2791C7.60871 16.8404 6.66913 15.1895 7.10783 13.5918C8.09817 9.98502 10.9672 7.53373 14.0778 6.06516C17.2212 4.58109 20.9936 3.89703 24.609 4.01251C28.2067 4.12742 31.9442 5.04572 34.8743 7.08308ZM19 39C19 36.7909 20.7909 35 23 35C25.2092 35 27 36.7909 27 39C27 41.2091 25.2092 43 23 43C20.7909 43 19 41.2091 19 39Z" fill="#333333"/>
            </svg>
            My Topics
          </div>
        </a>

        <a href="#" class="mb-1 hover:bg-gray-200 text-sm">
          <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(false) bg-blue-100 border-blue-900 @endif">
            <svg class="w-6 h-6 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            My Answers
          </div>
        </a>

        <a href="{{ route('category.index') }}" class="mb-1 hover:bg-gray-200 text-sm">
          <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('category.index')) bg-blue-100 border-blue-900 @endif">
            <svg class="mr-2 ml-5" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 3.58824C5.76727 3.58824 4.73635 3.76289 4.052 3.89936C3.97331 3.91505 3.91505 3.97331 3.89936 4.052C3.76289 4.73635 3.58824 5.76727 3.58824 6.5C3.58824 7.23273 3.76289 8.26365 3.89936 8.948C3.91505 9.02669 3.97331 9.08495 4.052 9.10064C4.73635 9.23711 5.76727 9.41177 6.5 9.41177C7.23273 9.41177 8.26365 9.23711 8.948 9.10064C9.02669 9.08495 9.08495 9.02669 9.10064 8.948C9.23711 8.26365 9.41177 7.23273 9.41177 6.5C9.41177 5.76727 9.23711 4.73635 9.10064 4.052C9.08495 3.97331 9.02669 3.91505 8.948 3.89936C8.26365 3.76289 7.23273 3.58824 6.5 3.58824ZM3.7414 2.34179C4.42728 2.20502 5.59496 2 6.5 2C7.40504 2 8.57272 2.20502 9.2586 2.34179C9.96673 2.483 10.517 3.03328 10.6582 3.7414C10.795 4.42728 11 5.59496 11 6.5C11 7.40504 10.795 8.57272 10.6582 9.2586C10.517 9.96673 9.96672 10.517 9.2586 10.6582C8.57272 10.795 7.40504 11 6.5 11C5.59496 11 4.42728 10.795 3.7414 10.6582C3.03327 10.517 2.483 9.96672 2.34179 9.2586C2.20502 8.57272 2 7.40504 2 6.5C2 5.59496 2.20502 4.42728 2.34179 3.7414C2.483 3.03327 3.03328 2.483 3.7414 2.34179Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 14.5882C5.76727 14.5882 4.73635 14.7629 4.052 14.8994C3.97331 14.9151 3.91505 14.9733 3.89936 15.052C3.76289 15.7363 3.58824 16.7673 3.58824 17.5C3.58824 18.2327 3.76289 19.2637 3.89936 19.948C3.91505 20.0267 3.97331 20.0849 4.052 20.1006C4.73635 20.2371 5.76727 20.4118 6.5 20.4118C7.23273 20.4118 8.26365 20.2371 8.948 20.1006C9.02669 20.0849 9.08495 20.0267 9.10064 19.948C9.23711 19.2637 9.41177 18.2327 9.41177 17.5C9.41177 16.7673 9.23711 15.7363 9.10064 15.052C9.08495 14.9733 9.02669 14.9151 8.948 14.8994C8.26365 14.7629 7.23273 14.5882 6.5 14.5882ZM3.7414 13.3418C4.42728 13.205 5.59496 13 6.5 13C7.40504 13 8.57272 13.205 9.2586 13.3418C9.96673 13.483 10.517 14.0333 10.6582 14.7414C10.795 15.4273 11 16.595 11 17.5C11 18.405 10.795 19.5727 10.6582 20.2586C10.517 20.9667 9.96672 21.517 9.2586 21.6582C8.57272 21.795 7.40504 22 6.5 22C5.59496 22 4.42728 21.795 3.7414 21.6582C3.03327 21.517 2.483 20.9667 2.34179 20.2586C2.20502 19.5727 2 18.405 2 17.5C2 16.595 2.20502 15.4273 2.34179 14.7414C2.483 14.0333 3.03328 13.483 3.7414 13.3418Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 3.58824C16.7673 3.58824 15.7363 3.76289 15.052 3.89936C14.9733 3.91505 14.9151 3.97331 14.8994 4.052C14.7629 4.73635 14.5882 5.76727 14.5882 6.5C14.5882 7.23273 14.7629 8.26365 14.8994 8.948C14.9151 9.02669 14.9733 9.08495 15.052 9.10064C15.7363 9.23711 16.7673 9.41177 17.5 9.41177C18.2327 9.41177 19.2637 9.23711 19.948 9.10064C20.0267 9.08495 20.0849 9.02669 20.1006 8.948C20.2371 8.26365 20.4118 7.23273 20.4118 6.5C20.4118 5.76727 20.2371 4.73635 20.1006 4.052C20.0849 3.97331 20.0267 3.91505 19.948 3.89936C19.2637 3.76289 18.2327 3.58824 17.5 3.58824ZM14.7414 2.34179C15.4273 2.20502 16.595 2 17.5 2C18.405 2 19.5727 2.20502 20.2586 2.34179C20.9667 2.483 21.517 3.03328 21.6582 3.7414C21.795 4.42728 22 5.59496 22 6.5C22 7.40504 21.795 8.57272 21.6582 9.2586C21.517 9.96673 20.9667 10.517 20.2586 10.6582C19.5727 10.795 18.405 11 17.5 11C16.595 11 15.4273 10.795 14.7414 10.6582C14.0333 10.517 13.483 9.96672 13.3418 9.2586C13.205 8.57272 13 7.40504 13 6.5C13 5.59496 13.205 4.42728 13.3418 3.7414C13.483 3.03327 14.0333 2.483 14.7414 2.34179Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 14.5882C16.7673 14.5882 15.7363 14.7629 15.052 14.8994C14.9733 14.9151 14.9151 14.9733 14.8994 15.052C14.7629 15.7363 14.5882 16.7673 14.5882 17.5C14.5882 18.2327 14.7629 19.2637 14.8994 19.948C14.9151 20.0267 14.9733 20.0849 15.052 20.1006C15.7363 20.2371 16.7673 20.4118 17.5 20.4118C18.2327 20.4118 19.2637 20.2371 19.948 20.1006C20.0267 20.0849 20.0849 20.0267 20.1006 19.948C20.2371 19.2637 20.4118 18.2327 20.4118 17.5C20.4118 16.7673 20.2371 15.7363 20.1006 15.052C20.0849 14.9733 20.0267 14.9151 19.948 14.8994C19.2637 14.7629 18.2327 14.5882 17.5 14.5882ZM14.7414 13.3418C15.4273 13.205 16.595 13 17.5 13C18.405 13 19.5727 13.205 20.2586 13.3418C20.9667 13.483 21.517 14.0333 21.6582 14.7414C21.795 15.4273 22 16.595 22 17.5C22 18.405 21.795 19.5727 21.6582 20.2586C21.517 20.9667 20.9667 21.517 20.2586 21.6582C19.5727 21.795 18.405 22 17.5 22C16.595 22 15.4273 21.795 14.7414 21.6582C14.0333 21.517 13.483 20.9667 13.3418 20.2586C13.205 19.5727 13 18.405 13 17.5C13 16.595 13.205 15.4273 13.3418 14.7414C13.483 14.0333 14.0333 13.483 14.7414 13.3418Z" fill="#030D45"/>
            </svg>
            Categories
          </div>
        </a>

        @auth
        @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.home') }}" class="mb-1 hover:bg-gray-200 text-sm">
          <div class="py-2 inline-flex items-center w-full border-l-4 border-transparent @if(request()->routeIs('admin.home')) bg-blue-100 border-blue-900 @endif">
            <svg class="w-6 h-6 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            Admin
          </div>
        </a>
        @endif


        <a href="{{ route('setting.index') }}" class="mb-1 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('setting.index')) bg-blue-100 border-blue-900 @endif">
           <users-icon class="invisible w-7 h-7 mr-2 ml-5"></users-icon>
           Settings
         </div>
       </a>
       @endauth

       <a href="{{ route('users') }}" class="mb-1 hover:bg-gray-200 text-sm">
        <div class="py-2 inline-flex w-full border-l-4 border-transparent @if(request()->routeIs('users')) bg-blue-100 border-blue-900 @endif">
         <users-icon class="w-6 h-6 mr-2 ml-5"></users-icon>
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
        class="w-8 h-8 object-center object-cover rounded-full mr-4" alt="Profile Picture">
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

      <button id="switch" class="flex-shrink-0 rounded-full h-6 w-6 bg-lime-300 border mr-10"></button>
    </div>

  </nav>

</div>
