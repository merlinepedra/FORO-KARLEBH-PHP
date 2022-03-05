
<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Forume -  <?php echo $__env->yieldContent('title'); ?></title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

  <!-- Scripts -->
  <script defer>
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
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<body>
  <div id="main" v-cloak class="bg-gray-200">

    
    <a class="<?php if(request()->routeIs('post.create')): ?> hidden <?php endif; ?>" href="<?php echo e(route('post.create')); ?>">
      <div class="bg-blue-900 hover:bg-blue-800 h-12 w-12 rounded-full fixed z-50 bottom-10 right-7 grid place-items-center md:hidden">
        <span class="text-gray-50 font-black text-4xl">+</span>
      </div>
    </a>
    

    <header class="px-6 pt-6 pb-3  bg-white dark:bg-gray-700 dark:text-gray-100 shadow-md relative">
      <div class="max-w-7xl font-semibold mx-auto">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forume.mobile-header','data' => []]); ?>
<?php $component->withName('forume.mobile-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php echo $__env->make('components.forume.desktop-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </header>
    <clip-design></clip-design>

    <main class="font-sans antialiased mx-auto my-10 flex gap-x-10 max-w-7xl">
      <div class="w-3/12 hidden md:block">
       <nav class="flex flex-col">

        <div class="py-2 inline-flex w-full border-l-4 border-transparent">
          <div class="w-7 h-7 mr-2 ml-5"></div>
          Menu
        </div>

        <a href="<?php echo e(route('post.index')); ?>" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('post.index')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
            <Explore class="w-7 h-7 mr-2 ml-5"></Explore>
            Explore Topics
          </div>
        </a>

        <a href="<?php echo e(route('user.posts')); ?>" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('user.posts')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M24 29.3485C24 28.3722 24.7049 27.5385 25.6676 27.3763C27.7916 27.0183 30.1723 26.3473 32.2652 25.2485C35.3472 23.6303 38.0008 20.9633 38.0008 16.8447C38.0008 13.2074 36.2944 10.5064 33.7326 8.72515C31.2093 6.97066 27.8823 6.11808 24.5452 6.01149C21.2024 5.90472 17.7512 6.54254 14.9316 7.87372C12.1196 9.20135 9.81587 11.2827 9.03645 14.1214C8.89021 14.6539 9.20341 15.2042 9.73598 15.3505C10.2686 15.4967 10.8188 15.1835 10.9651 14.6509C11.5336 12.5804 13.272 10.869 15.7855 9.68229C18.2813 8.50395 21.4113 7.91241 24.4813 8.01047C27.5578 8.10874 30.4742 8.89549 32.5908 10.3672C34.6739 11.8156 36.0008 13.931 36.0008 16.8447C36.0008 19.9159 34.0809 22.0363 31.3355 23.4777C28.5988 24.9145 25.2495 25.5481 22.9432 25.6794C22.4139 25.7095 22 26.1475 22 26.6777V30C22 30.5523 22.4477 31 23 31C23.5523 31 24 30.5523 24 30V29.3485ZM23 37C21.8955 37 21 37.8954 21 39C21 40.1046 21.8955 41 23 41C24.1046 41 25 40.1046 25 39C25 37.8954 24.1046 37 23 37ZM34.8743 7.08308C37.9149 9.1972 40.0008 12.4839 40.0008 16.8447C40.0008 22.0099 36.6142 25.224 33.195 27.0192C30.8637 28.2432 28.2668 28.9664 26 29.3485V30C26 31.6568 24.6569 33 23 33C21.3432 33 20 31.6568 20 30V26.6777C20 25.0871 21.2415 23.773 22.8296 23.6826C24.9482 23.562 27.996 22.9722 30.4058 21.7069C32.7869 20.4568 34.0008 18.8909 34.0008 16.8447C34.0008 14.6496 33.0491 13.1219 31.4491 12.0093C29.7386 10.82 27.2324 10.0994 24.4175 10.0095C21.6204 9.92011 18.8116 10.4653 16.6394 11.4909C14.4343 12.5319 13.2533 13.8706 12.8937 15.1805C12.455 16.7782 10.8041 17.7178 9.20643 17.2791C7.60871 16.8404 6.66913 15.1895 7.10783 13.5918C8.09817 9.98502 10.9672 7.53373 14.0778 6.06516C17.2212 4.58109 20.9936 3.89703 24.609 4.01251C28.2067 4.12742 31.9442 5.04572 34.8743 7.08308ZM19 39C19 36.7909 20.7909 35 23 35C25.2092 35 27 36.7909 27 39C27 41.2091 25.2092 43 23 43C20.7909 43 19 41.2091 19 39Z" fill="#333333"/>
            </svg>
            My Topics
          </div>
        </a>

        <a href="<?php echo e(route('my-comments')); ?>" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('my-comments')): ?>) bg-blue-100 border-blue-900 <?php endif; ?>">
            <svg class="w-7 h-7 mr-2 ml-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
            My Answers
          </div>
        </a>

        <a href="<?php echo e(route('category.index')); ?>" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('category.index')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
            <svg class="mr-2 ml-5" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 3.58824C5.76727 3.58824 4.73635 3.76289 4.052 3.89936C3.97331 3.91505 3.91505 3.97331 3.89936 4.052C3.76289 4.73635 3.58824 5.76727 3.58824 6.5C3.58824 7.23273 3.76289 8.26365 3.89936 8.948C3.91505 9.02669 3.97331 9.08495 4.052 9.10064C4.73635 9.23711 5.76727 9.41177 6.5 9.41177C7.23273 9.41177 8.26365 9.23711 8.948 9.10064C9.02669 9.08495 9.08495 9.02669 9.10064 8.948C9.23711 8.26365 9.41177 7.23273 9.41177 6.5C9.41177 5.76727 9.23711 4.73635 9.10064 4.052C9.08495 3.97331 9.02669 3.91505 8.948 3.89936C8.26365 3.76289 7.23273 3.58824 6.5 3.58824ZM3.7414 2.34179C4.42728 2.20502 5.59496 2 6.5 2C7.40504 2 8.57272 2.20502 9.2586 2.34179C9.96673 2.483 10.517 3.03328 10.6582 3.7414C10.795 4.42728 11 5.59496 11 6.5C11 7.40504 10.795 8.57272 10.6582 9.2586C10.517 9.96673 9.96672 10.517 9.2586 10.6582C8.57272 10.795 7.40504 11 6.5 11C5.59496 11 4.42728 10.795 3.7414 10.6582C3.03327 10.517 2.483 9.96672 2.34179 9.2586C2.20502 8.57272 2 7.40504 2 6.5C2 5.59496 2.20502 4.42728 2.34179 3.7414C2.483 3.03327 3.03328 2.483 3.7414 2.34179Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 14.5882C5.76727 14.5882 4.73635 14.7629 4.052 14.8994C3.97331 14.9151 3.91505 14.9733 3.89936 15.052C3.76289 15.7363 3.58824 16.7673 3.58824 17.5C3.58824 18.2327 3.76289 19.2637 3.89936 19.948C3.91505 20.0267 3.97331 20.0849 4.052 20.1006C4.73635 20.2371 5.76727 20.4118 6.5 20.4118C7.23273 20.4118 8.26365 20.2371 8.948 20.1006C9.02669 20.0849 9.08495 20.0267 9.10064 19.948C9.23711 19.2637 9.41177 18.2327 9.41177 17.5C9.41177 16.7673 9.23711 15.7363 9.10064 15.052C9.08495 14.9733 9.02669 14.9151 8.948 14.8994C8.26365 14.7629 7.23273 14.5882 6.5 14.5882ZM3.7414 13.3418C4.42728 13.205 5.59496 13 6.5 13C7.40504 13 8.57272 13.205 9.2586 13.3418C9.96673 13.483 10.517 14.0333 10.6582 14.7414C10.795 15.4273 11 16.595 11 17.5C11 18.405 10.795 19.5727 10.6582 20.2586C10.517 20.9667 9.96672 21.517 9.2586 21.6582C8.57272 21.795 7.40504 22 6.5 22C5.59496 22 4.42728 21.795 3.7414 21.6582C3.03327 21.517 2.483 20.9667 2.34179 20.2586C2.20502 19.5727 2 18.405 2 17.5C2 16.595 2.20502 15.4273 2.34179 14.7414C2.483 14.0333 3.03328 13.483 3.7414 13.3418Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 3.58824C16.7673 3.58824 15.7363 3.76289 15.052 3.89936C14.9733 3.91505 14.9151 3.97331 14.8994 4.052C14.7629 4.73635 14.5882 5.76727 14.5882 6.5C14.5882 7.23273 14.7629 8.26365 14.8994 8.948C14.9151 9.02669 14.9733 9.08495 15.052 9.10064C15.7363 9.23711 16.7673 9.41177 17.5 9.41177C18.2327 9.41177 19.2637 9.23711 19.948 9.10064C20.0267 9.08495 20.0849 9.02669 20.1006 8.948C20.2371 8.26365 20.4118 7.23273 20.4118 6.5C20.4118 5.76727 20.2371 4.73635 20.1006 4.052C20.0849 3.97331 20.0267 3.91505 19.948 3.89936C19.2637 3.76289 18.2327 3.58824 17.5 3.58824ZM14.7414 2.34179C15.4273 2.20502 16.595 2 17.5 2C18.405 2 19.5727 2.20502 20.2586 2.34179C20.9667 2.483 21.517 3.03328 21.6582 3.7414C21.795 4.42728 22 5.59496 22 6.5C22 7.40504 21.795 8.57272 21.6582 9.2586C21.517 9.96673 20.9667 10.517 20.2586 10.6582C19.5727 10.795 18.405 11 17.5 11C16.595 11 15.4273 10.795 14.7414 10.6582C14.0333 10.517 13.483 9.96672 13.3418 9.2586C13.205 8.57272 13 7.40504 13 6.5C13 5.59496 13.205 4.42728 13.3418 3.7414C13.483 3.03327 14.0333 2.483 14.7414 2.34179Z" fill="#030D45"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 14.5882C16.7673 14.5882 15.7363 14.7629 15.052 14.8994C14.9733 14.9151 14.9151 14.9733 14.8994 15.052C14.7629 15.7363 14.5882 16.7673 14.5882 17.5C14.5882 18.2327 14.7629 19.2637 14.8994 19.948C14.9151 20.0267 14.9733 20.0849 15.052 20.1006C15.7363 20.2371 16.7673 20.4118 17.5 20.4118C18.2327 20.4118 19.2637 20.2371 19.948 20.1006C20.0267 20.0849 20.0849 20.0267 20.1006 19.948C20.2371 19.2637 20.4118 18.2327 20.4118 17.5C20.4118 16.7673 20.2371 15.7363 20.1006 15.052C20.0849 14.9733 20.0267 14.9151 19.948 14.8994C19.2637 14.7629 18.2327 14.5882 17.5 14.5882ZM14.7414 13.3418C15.4273 13.205 16.595 13 17.5 13C18.405 13 19.5727 13.205 20.2586 13.3418C20.9667 13.483 21.517 14.0333 21.6582 14.7414C21.795 15.4273 22 16.595 22 17.5C22 18.405 21.795 19.5727 21.6582 20.2586C21.517 20.9667 20.9667 21.517 20.2586 21.6582C19.5727 21.795 18.405 22 17.5 22C16.595 22 15.4273 21.795 14.7414 21.6582C14.0333 21.517 13.483 20.9667 13.3418 20.2586C13.205 19.5727 13 18.405 13 17.5C13 16.595 13.205 15.4273 13.3418 14.7414C13.483 14.0333 14.0333 13.483 14.7414 13.3418Z" fill="#030D45"/>
            </svg>
            Categories
          </div>
        </a>

        <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isAdmin()): ?>
        <a href="<?php echo e(route('admin.home')); ?>" class="mb-3 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('admin.home')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 ml-5"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Admin
          </div>
        </a>
        <?php endif; ?>
        <?php endif; ?>

        <a href="<?php echo e(route('users')); ?>" class="mb-1 hover:bg-gray-200">
          <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('users')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
           <users-icon class="w-7 h-7 mr-2 ml-5"></users-icon>
           All Users
         </div>
       </a>

       <?php if(auth()->guard()->check()): ?>

       <a href="<?php echo e(route('setting.index')); ?>" class="mb-1 hover:bg-gray-200">
        <div class="py-2 inline-flex w-full border-l-4 border-transparent <?php if(request()->routeIs('setting.index')): ?> bg-blue-100 border-blue-900 <?php endif; ?>">
         <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Settings
      </div>
    </a>

    <?php endif; ?>

  </nav>
</div>

<?php echo $__env->yieldContent('section'); ?>

<div class="w-3/12 hidden lg:block">

  <a href="<?php echo e(route('post.create')); ?>">
    <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md">
      <span class="text-lg">+</span>
      <span class="ml-2">Start a New Topic</span>
    </div>
  </a>

  <div class="mt-10">
    <h2 class="font-semibold mb-2">Top Users</h2>
    <div class="grid gap-y-2 mb-20 shadow-lg rounded-md p-3 bg-gray-100">
      <?php $__currentLoopData = \App\Models\User::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="grid grid-cols-8">
        <img 
        <?php if($user->profile->file): ?> 
        src="/storage/uploads/<?php echo e($user->profile->file->file); ?>" 
        <?php else: ?> src="/image-header.jpg" 
        <?php endif; ?>
        class="w-4 h-4 object-center object-cover rounded-full" alt="Profile Picture">

        <span class="text-blue-900 font-semibold text-xs col-span-5"><a href="<?php echo e(route('profile.show', $user->name)); ?>"><?php echo e($user->name); ?></a></span>

        <span><?php echo e($user->posts_count); ?></span>

        <span>  
          <svg class="fill-current text-gray-400 text-blue-900 w-4 h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 330 330"  xml:space="preserve">
          <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
          C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
          c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
        </svg></span>

      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>

  <div class="flex justify-between text-xs font-semibold text-gray-500 p-4 bg-gray-200 shadow">

    <div class="grid gap-y-2">
      <a href="#">Help</a>
      <a href="#">ForumePro</a>
      <a href="#">Topics</a>
      <a href="#">Top Topics</a>
      <a href="#">Blog</a>
      <a href="#">Advertise</a>
    </div>

    <div class="grid">
      <a href="#">About</a>
      <a href="#">Careers</a>
      <a href="#">Press</a>
      <a href="#">Terms</a>
      <a href="#">Privacy Policy</a>

    </div>
  </div>

</div>

</main>

<div class="flex justify-evenly text-gray-500 md:hidden">

  <div class="grid">
    <a href="#">Help</a>
    <a href="#">ForumePro</a>
    <a href="#">Topics</a>
    <a href="#">Top Topics</a>
    <a href="#">Blog</a>
    <a href="#">Advertise</a>
  </div>
  
  <div class="grid">
    <a href="#">About</a>
    <a href="#">Careers</a>
    <a href="#">Press</a>
    <a href="#">Terms</a>
    <a href="#">Privacy Policy</a>

  </div>
</div>

<br>
<br>
<br>
</div>
</body>
</html>
<?php /**PATH C:\laragon\www\Jet\resources\views/layouts/app.blade.php ENDPATH**/ ?>