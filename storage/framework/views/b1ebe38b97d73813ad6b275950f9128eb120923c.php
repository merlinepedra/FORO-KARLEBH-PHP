

<?php $__env->startSection('title',  str_replace('-', ' ', $profile->name) . '\'s profile'); ?>

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full bg-gray-100 rounded-md p-6 mt-5 text-gray-800 dark:bg-gray-500 dark:text-gray-200">

  <div class="grid place-items-center sm:grid-cols-2">
    <div>
      <img class="h-28 md:h-40 rounded-md" <?php if($latestPic): ?> src="/storage/uploads/<?php echo e($latestPic); ?>" <?php else: ?> src="/image-header.jpg" <?php endif; ?>>
      <?php echo e($latestPic); ?>

      
    </div>

    <div class="flex flex-col">
      <div class="hidden md:block">
        <p class="capitalize text-xl"><?php echo e(str_replace('-', ' ', $profile->name)); ?></p>
        <p class="text-gray-600 dark:text-gray-300  -mt-2">user</p>
      </div>

      <div class="flex rounded-md mt-4">
        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1 rounded-l-md">
          <div class="text-xs text-gray-500 dark:text-gray-800">Posts</div>
          <div class="text-lg dark:text-gray-200"><?php echo e($profile->user->posts->count()); ?></div>
        </div>

        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1">
          <div class="text-xs text-gray-500 dark:text-gray-800">Followers</div>
          <div class="text-lg dark:text-gray-200"><?php echo e($profile->followers->count()); ?></div>
        </div>

        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1 rounded-r-md">
          <div class="text-xs text-gray-500 dark:text-gray-800">Comments</div>
          <div class="text-lg dark:text-gray-200"><?php echo e($profile->user->comments->count()); ?></div>
        </div>
      </div>
    </div>
  </div>


  

  <?php if(auth()->id() !== $profile->id): ?>
  <div class="flex justify-center my-6">
    <Follow 
    :user_id="<?php echo e($profile->user->id); ?>"
    :follows="<?php echo e(auth()->user() ? (int) auth()->user()->following->contains($profile->user->id) : 0); ?>"
    ></Follow>
  </div>
  <?php endif; ?>
  



  <div class="mt-5 dark:bg-gray-300 p-5 rounded-md">

    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500">Email</span>
      <span class="text-gray-800"><?php echo e($profile->user->email); ?></span>
    </div>

    <?php if($profile->city): ?>
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500">City</span>
      <span class="text-gray-800"><?php echo e($profile->user->city); ?></span>
    </div>
    <?php endif; ?>

    <?php if($profile->phone): ?>
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500">Phone</span>
      <span class="text-gray-800"><?php echo e($profile->phone); ?></span>
    </div>
    <?php endif; ?>

    <?php if($profile->country): ?>
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500">Country</span>
      <span class="text-gray-800"><?php echo e($profile->country); ?></span>
    </div>
    <?php endif; ?>

    <?php if($profile->sex): ?>
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500">Gender</span>
      <span class="text-gray-800"><?php echo e(ucfirst($profile->sex)); ?></span>
    </div>
    <?php endif; ?>

  </div>

  
  

  <div class="dark:bg-gray-300 bg-blue-100 p-4 rounded-md mt-4">
    <?php echo $__env->make('components.posts', ['posts' => App\Models\Post::whereUserId($profile->user_id)->latest()->take(5)->get()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>



</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/profile/show.blade.php ENDPATH**/ ?>