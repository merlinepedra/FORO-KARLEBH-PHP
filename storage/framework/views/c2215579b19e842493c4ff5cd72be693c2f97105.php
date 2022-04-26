  <h1 class="text-center text-lg dark:text-gray-800">Recent Posts</h1>
  <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="my-4 p-4 bg-gray-200 shadow-md rounded-md dark:bg-gray-400 dark:text-gray-700">
      <div class="flex">
       <div class="w-11/12">
        <a href="<?php echo e(route('post.show', $post)); ?>">
          <h1 class="lg:text-xl font-semibold truncate"><?php echo e($post->title); ?></h1>
          <p class="text-gray-600 font-base mt-3"><?php echo e($post->desc); ?></p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="flex text-sm mr-4">
          <span class="mr-2">in</span>
          <a href="<?php echo e(route('category.show', $post->category)); ?>" class="text-blue-900 font-semibold mr-2" >
            <?php echo e($post->category); ?></a>
        </div>

        <span class="text-sm"><?php echo e($post->created_at->shortRelativeDiffForHumans()); ?></span>
      </div>

      <div class="flex items-center">
        <svg class="mr-1" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
        <span><?php echo e($post->comments_count); ?></span>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<h1 class="text-center"> <span class="dark:text-gray-500">No Posts Yet</span> <a href="<?php echo e(route('post.create')); ?>" class="ml-4 text-blue-900 font-semibold">Create a Topic</a></h1>

<?php endif; ?><?php /**PATH C:\laragon\www\Forume\resources\views/components/posts.blade.php ENDPATH**/ ?>