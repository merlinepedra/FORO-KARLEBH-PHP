

<?php $__env->startSection('content'); ?>

<change-title v-if="changeTitle" v-on:close="changeTitle = false"></change-title>

<div>

  <div class="flex justify-between items-center">

    <div>
      <h1 class="text-2xl">Posts (<?php echo e($posts->count()); ?>)</h1>
    </div>

    <a href="<?php echo e(route('post.create')); ?>">
      <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md w-48">
        <span class="text-lg">+</span>
        <span class="ml-2">Start a New Topic</span>
      </div>
    </a>
  </div>

  <div style="height: .05rem;" class="bg-gray-400 mb-3"></div>

  <div class="grid lg:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow">
    <div>Title</div>
    <div>Views</div>
    <div>Comments</div>
    <div>Category</div>
    <div>
      <div class="md:flex justify-center">
        Actions
      </div>
    </div>
  </div>

  <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <div class="grid lg:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
    <div>
      <h4>
        <?php echo e($post->title); ?>


      </h4>
    </div>

    <div class="flex">
      <span class="mr-3">
        <?php echo e($post->views); ?> 
      </span>

      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg>
    </div>

    <div class="flex">
      <span class="mr-3">
        <?php echo e($post->comments_count); ?> 
      </span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
      </svg>
    </div>

    <div>
      <change-category 
      :categories="<?php echo e(App\Models\Category::all()); ?>" 
      :category_id="<?php echo e($post->category_id); ?>"
      :current_category="<?php echo e(App\Models\Category::find($post->category_id)); ?>"
      post_slug="<?php echo e($post->slug); ?>"
      ></change-category>


    </div>

    <div class="flex justify-around items-center">
      <make-latest post_slug="<?php echo e($post->slug); ?>"></make-latest>

      <button onclick="alert('Only super admin can delete posts')">
        <svg id="delete" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </button>

      <a href="<?php echo e(route('post.edit', $post->slug)); ?>">
        <svg id="delete" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </a>
    </div>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <?php endif; ?>
</div>

<?php echo e($posts->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/admin/post.blade.php ENDPATH**/ ?>