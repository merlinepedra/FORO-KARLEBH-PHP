

<?php $__env->startSection('content'); ?>

<div class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow">
  <div>Comment</div>
  <div>Owner</div>
  <div>Post</div>
  <div>Actions</div>
</div>

<?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

<div 
class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
<div>
  <p>
    <?php echo e(Str::limit($comment->comment, 10)); ?>

  </p>
</div>

<div>
  <?php echo e($comment->user->name); ?>

</div>

<div>
  <a href="<?php echo e(route('post.show', $comment->post->slug)); ?>">
    <?php echo e($comment->post->title); ?> 
  </a>
</div>

<div>
  <button onclick="alert('Only Super Admin can perform this action')">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
  </button>
</div>

<div>
</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>

<?php echo e($comments->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Jet\resources\views/admin/comment.blade.php ENDPATH**/ ?>