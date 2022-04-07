<div class="hidden md:block desktop-header">

  <div class="flex justify-between items-center">

    <div class="flex">
      <svg class="mr-2 fill-current text-blue-600" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 7V17M9 10V14M6 8V16M3 11V13M15 4V20M18 9V15M21 11V13" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="<?php echo e(route('post.index')); ?>">
        <h1 class="text-lg font-bold">foru<span class="text-blue-900">me</span></h1>
      </a>
    </div>

    <div class="w-5/12 relative">
     <search-drop-down class="mr-8"></search-drop-down>
   </div>

   <div class="flex items-center">

    <dark-light-mode class="mr-8"></dark-light-mode>

    <?php if(auth()->guard()->check()): ?>
    <span class="mr-8 relative">
      <a href="<?php echo e(route('notifications')); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current w-6 h-6 relative">
          <g><path d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"></path></g></svg>
          <span class="text-blue-100 font-extrabold text-[.55rem] absolute -top-1 -right-1 bg-blue-900 py-[.5] px-1 rounded-full">
            <?php if(auth()->user()->unreadNotifications()->count() > 0): ?>
            <notification-counter :count="<?php echo e(auth()->user()->unreadNotifications()->count()); ?>"></notification-counter>
            <?php endif; ?>
          </span>
        </a>
      </span>
      <?php endif; ?>

      <div class="relative flex-shrink-0">
        <?php if(auth()->guard()->check()): ?>
        <button v-on:click="profileMenu = !profileMenu">
          <?php if(auth()->user()->profile->file): ?>
          <img src="/storage/uploads/<?php echo e(auth()->user()->profile->file->file); ?>" 
          class="relative z-20 w-8 h-8 object-center object-cover rounded-full border-2 border-gray-900">
          <?php else: ?>
          <img src="/image-header.jpg" class="relative z-20 w-8 h-8 object-center object-cover rounded-full">
          <?php endif; ?>
        </button>

        <button class="inset-0 fixed w-full h-full bg-transparent z-10" v-if="profileMenu" v-on:click="profileMenu = false"></button>
        <transition name="flip">
          <div v-if="profileMenu" id="profile-menu" class="font-light absolute right-0 bg-blue-900 text-blue-100 pt-4 mt-5 z-20 w-48 text-center shadow-md ">
            <a v-on:click="profileMenu = false" class="block mt-3 hover:bg-blue-100 hover:text-gray-900 px-2 py-2" href="<?php echo e(route('profile.edit', auth()->user()->profile->name)); ?>">Edit Profile</a>
            <a v-on:click="profileMenu = false" class="block mt-3 hover:bg-blue-100 hover:text-gray-900 px-2 py-2" href="<?php echo e(route('profile.show', auth()->user()->profile->name)); ?>">
              
              <?php echo e(auth()->user()->name); ?>

            </a>
            <form action="<?php echo e(route('logout')); ?>" id="logout" method="POST">
              <?php echo csrf_field(); ?>
              <button v-on:click="profileMenu = false" class="w-full hover:bg-blue-100 hover:text-gray-900 py-2 mt-3" href="">Logout</button>
            </form>
          </div>
        </transition>
        <?php else: ?>
        <div class="text-gray-700 dark:text-gray-300">
          <a class="mr-4" href="<?php echo e(route('login')); ?>">login</a>
          <a class="" href="<?php echo e(route('register')); ?>">register</a>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </div>

</div>
<?php /**PATH C:\laragon\www\Forume\resources\views/components/forume/desktop-header.blade.php ENDPATH**/ ?>