

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full">

  <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">

    <h1 class="text-2xl font-base text-center"><?php echo e(ucfirst($category->name)); ?></h1>

    <?php $__empty_1 = true; $__currentLoopData = $category->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="my-10 border-b border-gray-500">
      <div class="flex justify-between">
        <div>
          <a href="<?php echo e(route('post.show', $post)); ?>">
            <h1 class="text-lg md:text-xl font-semibold truncate text-gray-700"><?php echo e($post->title); ?></h1>
          </a>
          <p class="font-base opacity-75 truncate"><?php echo e($post->desc); ?></p>
        </div>
        <div>
          <p class="italic"> comment(s) <span class="text-blue-900 font-bold"><?php echo e($post->comments->count()); ?></span></p>
        </div>
      </div>

      <div class="w-full py-4">
        <p>by <a href="<?php echo e(route('profile.show', $post->user->name)); ?>" class="text-lime-500 text-sm"><?php echo e($post->user->name); ?></a>  <?php echo e($post->created_at->diffForHumans()); ?></p>
      </div>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <h1>No Posts Yet.    <a href="<?php echo e(route('post.create')); ?>" class="ml-4 text-blue-500">Create post?</a></h1>

    <?php endif; ?>

  </div> 

  <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
    <div>
      <div class="w-auto h-40 bg-red-500"></div>
    </div>
    <div class="col-start-3">
      <div class="w-auto h-40 bg-blue-500"></div>
    </div>
    <div>
      <div class="w-auto h-40 bg-yellow-500"></div>
    </div>
    <div>
      <div class="w-auto h-40 bg-lime-500"></div>
    </div>
    
      <div class="row-start-1 col-start-2 col-span-2">
        <div class="w-auto h-40 bg-purple-500"></div>
      </div>
    </div>


  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/category/show.blade.php ENDPATH**/ ?>