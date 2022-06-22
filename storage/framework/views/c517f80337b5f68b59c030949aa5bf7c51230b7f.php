

<?php $__env->startSection('content'); ?>

<div class="grid gap-y-4">
<?php $__empty_1 = true; $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

  <div 
  class="grid grid-cols-2 md:grid-cols-4 gap-y-8 py-10 md:py-5 bg-gray-50 dark:bg-gray-700 justify-between items-center px-3 rounded-md shadow-lg">
    <div>
      <?php if($profile->file): ?>
      <img class="w-8 h-8 object-center object-cover rounded-full" src="/uploads/<?php echo e($profile->file->file); ?>" alt="">
      <?php else: ?> 
      <img class="w-8 h-8 object-center object-cover rounded-full" src="/image-header.jpg" >
      <?php endif; ?>
    </div>

    <div class=" text-blue-800 dark:text-gray-400 font-bold text-md">
      <a href="<?php echo e(route('profile.show', $profile->name)); ?>"><?php echo e($profile->name); ?></a>
    </div>

    <div class="dark:text-gray-200">
      <?php echo e($profile->user->posts->count()); ?> posts
    </div>

    <div class="flex  justify-around">
      <toggle-admin 
      :is_admin="<?php echo e($profile->user->is_admin ? 'true' : 'false'); ?>"
      :user_id="<?php echo e($profile->user_id); ?>"
       class="flex-shrink-0 flex-grow-0"
      ></toggle-admin>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?>

<?php echo e($profiles->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/admin/users.blade.php ENDPATH**/ ?>