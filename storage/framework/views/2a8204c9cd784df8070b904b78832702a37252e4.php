

<?php $__env->startSection('title', "my comments"); ?>

<?php $__env->startSection('section'); ?>

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md">
 <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

 <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">
  <div class="flex">
   <div class="w-11/12">
    <a href="<?php echo e(route('post.show', $comment->post)); ?>">
      <h1 class="text-xl truncate"><?php echo e($comment->post->title); ?></h1>
      <p class="text-gray-600 font-base mt-3"><?php echo e($comment->comment); ?></p>
    </a>
  </div>
</div>

<hr class="my-2 bg-gray-400">

<div class="w-full py-1 flex justify-between items-center">
  <div class="flex justify-center">
    <div class="mr-3">
      <img 
      <?php if(!$comment->post->user->profile->file): ?> src="/image-header.jpg" <?php else: ?> src="/storage/uploads/<?php echo e($comment->post->user->profile->file->file); ?>" <?php endif; ?> 
      class="w-6 h-6 object-center object-cover rounded-full" alt="image">
    </div>

    <div class="flex text-sm mr-4">
      <div class="mr-2"><span class="hidden md:inline mr-2">posted</span>by</div>

      <a href="<?php echo e(route('profile.show', $comment->post->user->profile)); ?>" class="text-blue-900 font-semibold mr-2" ><?php echo e($comment->post->user->name); ?></a>
      <span class="mr-2">in</span>
      <a href="<?php echo e(route('category.show', $comment->post->category)); ?>" class="text-blue-900 font-semibold mr-2" >
        <?php echo e($comment->post->category); ?></a>
      </div>

      <span class="text-sm"><?php echo e($comment->post->created_at->shortRelativeDiffForHumans()); ?></span>
    </div>

    <div class="flex items-center">
     <Like
     :likeable_id="<?php echo e($comment->id); ?>"
     likeable_type="<?php echo e($comment::class); ?>"
     :user_id="<?php echo e($comment->user_id); ?>"
     class="mr-10"
     ></Like>
   </div>
 </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Jet\resources\views/comment/my-comments.blade.php ENDPATH**/ ?>