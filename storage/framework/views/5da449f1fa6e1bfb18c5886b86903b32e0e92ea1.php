

<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('section'); ?>


<div class="mx-auto w-full bg-gray-100 p-6 mt-6 rounded-md">
  <div>
    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    
    <?php if($notification->type === 'App\Notifications\LikeNotification'): ?> 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4 text-gray-700">

      <?php echo e($notification->data['liker']['name']); ?> liked 

      <?php echo e($notification->created_at->diffForHumans()); ?>

    </div>
    <?php endif; ?>

    
    <?php if($notification->type === 'App\Notifications\FollowNotifiation'): ?> 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4">
      <?php echo e($notification->data['follower']); ?>

    </div>
    <?php endif; ?>

    
    <?php if($notification->type === 'App\Notifications\CommentCreated'): ?> 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4">
      <?php echo e($notification->data['sender']); ?>

      <?php echo e($notification->data['message']); ?>

    </div>
    <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 

    <h3 class="text-center">No new notifications yet.</h3>

    <?php endif; ?>

  </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Jet\resources\views/notifications.blade.php ENDPATH**/ ?>