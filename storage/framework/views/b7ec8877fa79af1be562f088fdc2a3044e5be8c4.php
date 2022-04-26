

<?php $__env->startSection('content'); ?>
<div class="grid md:grid-cols-4 gap-5">

  <div class="md:col-span-2">
    <div
    class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-lime-600 p-4 flex items-center justify-between">
    <div class="flex flex-col">
      <span class="text-4xl font-bold text-gray-50">
        <?php echo e($users); ?>

      </spa7>
      <small class="font-extralight text-xs text-gray-50 mt-4">Total user registered.</small>
    </div>

    <users-icon class="w-7 h-7 fill-current text-lime-600"></users-icon>
  </div>
</div>

<div>
  <div
  class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-purple-600 p-4 flex items-center justify-between">
  <div class="flex flex-col">
    <span class="text-4xl font-bold text-gray-50">
      <?php echo e($categories); ?>

    </span>
    <small class="font-extralight text-xs text-gray-50 mt-4">Total categories created.</small>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" viewBox="0 0 20 20"
  fill="currentColor">
  <path
  d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
</svg>
</div>
</div>

<div>
  <div
  class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-yellow-600 p-4 flex items-center justify-between">
  <div class="flex flex-col">
    <span class="text-4xl font-bold text-gray-50">
      <?php echo e($comments); ?>

    </span>
    <small class="font-extralight text-xs text-gray-50 mt-4">Total comments created.</small>
  </div>
  <button>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-yellow-600" viewBox="0 0 20 20"
    fill="currentColor">
    <path fill-rule="evenodd"
    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
    clip-rule="evenodd" />
  </svg>
</button>
</div>
</div>

</div>



<div class="grid grid-cols-1 md:grid-cols-4 gap-5 items-center my-7">

  <div class="col-span-1">
    <Doughnut :posts="<?php echo e($posts); ?>" :comments="<?php echo e($comments); ?>"></Doughnut>
  </div>

  <div class="self-center">
    <div
    class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-emerald-600 p-4 flex items-center justify-between">
    <div class="flex flex-col">
      <span class="text-4xl font-bold text-gray-50">
        <?php echo e($posts); ?>

      </span>
      <small class="font-extralight text-xs text-gray-50 mt-4">Total posts created.</small>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-emerald-600" viewBox="0 0 20 20"
    fill="currentColor">
    <path fill-rule="evenodd"
    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
    clip-rule="evenodd" />
  </svg>

</div>
</div>

<div class="col-span-1 md:col-span-2">
  <users-chart :users="<?php echo e($users); ?>" :files="<?php echo e($files); ?>" :admins="<?php echo e($admins); ?>"
  :categories="<?php echo e($categories); ?>" :likes="<?php echo e($likes); ?>"></users-chart>
</div>

</div>



<div class="grid md:grid-cols-4 gap-5">

  <div>
    <div
    class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-blue-600 p-4 flex items-center justify-between">
    <div class="flex flex-col">
      <span class="text-4xl font-bold text-gray-50">
        <?php echo e($files); ?>

      </span>
      <small class="font-extralight text-xs text-gray-50 mt-4">Total files uploaded.</small>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
    </svg>
</div>
</div>


<div class="md:col-span-2">
  <div
  class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-cyan-600 p-4 flex items-center justify-between">
  <div class="flex flex-col">
    <span class="text-4xl font-bold text-gray-50">
      <?php echo e($admins); ?>

    </span>
    <small class="font-extralight text-xs text-gray-50 mt-4">Total admin superuser.</small>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-cyan-600" fill="none" viewBox="0 0 24 24"
  stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</div>
</div>

<div>
  <div
  class="bg-gray-600 w-full h-32 rounded-b-xl border-t-4 border-sky-600 p-4 flex items-center justify-between">
  <div class="flex flex-col">
    <span class="text-4xl font-bold text-gray-50">
      <?php echo e($likes); ?>

    </span>
    <small class="font-extralight text-xs text-gray-50 mt-4">Total likes.</small>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-sky-600" viewBox="0 0 20 20"
  fill="currentColor">
  <path fill-rule="evenodd"
  d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
  clip-rule="evenodd" />
</svg>
</div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/admin/overview.blade.php ENDPATH**/ ?>