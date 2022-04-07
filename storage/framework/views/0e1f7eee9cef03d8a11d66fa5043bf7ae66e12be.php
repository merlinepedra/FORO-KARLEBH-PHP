

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full">
  <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">
    <div class="flex">
     <div class="w-11/12">
      <a href="<?php echo e(route('category.show', $category)); ?>">
        <h1 class="lg:text-xl font-semibold truncate"><?php echo e($category->name); ?></h1>
        <p class="text-gray-600 font-base mt-3"><?php echo e($category->desc ?? "A Cool place to have fun!"); ?></p>
      </a>
    </div>
  </div>

  <hr class="my-2 bg-gray-400">

  <div class="w-full py-1 flex justify-between items-center">
    <div class="flex justify-center">

      <span class="text-sm"><span class="mr-3">created by Superuser</span><?php echo e($category->created_at->DiffForHumans()); ?></span>
    </div>

    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="text-blue-900 font-bold"><?php echo e($category->posts_count); ?></span>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<h1 class="text-center">No Posts Yet <a href="<?php echo e(route('post.create')); ?>" class="ml-4 text-blue-900 font-semibold">Create a Topic</a></h1>

<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/category/index.blade.php ENDPATH**/ ?>