

<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('section'); ?>


<div class="mx-auto w-full bg-gray-100 p-6 mt-6 rounded-md dark:bg-gray-500">
  <div>
    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    
    <?php if($notification->type === 'App\Notifications\LikeNotification'): ?> 
    <div id="<?php echo e($notification->id); ?>" class="bg-blue-200 dark:bg-gray-400 min-h-40 rounded-md shadow mb-3 p-4 text-gray-700 flex justify-between">
      <div>
        <a href="<?php echo e(route('profile.show', $notification->data['liker']['name'])); ?>" 
          class="capitalize font-semibold text-blue-400 dark:text-gray-200"><?php echo e(str_replace('-', ' ',  $notification->data['liker']['name'])); ?></a>

          liked 

          <?php if($notification->data['likeable_type'] === 'App\Models\Post'): ?>
          <a href="<?php echo e($notification->data['url']); ?>" class="font-semibold text-blue-400 dark:text-gray-200">your post</a>
          <?php elseif($notification->data['likeable_type'] === 'App\Models\Comment'): ?>
          <a href="<?php echo e($notification->data['url']); ?>" class="font-semibold text-blue-400 dark:text-gray-200">your comment</a>
          <?php endif; ?>



          <?php echo e($notification->created_at->diffForHumans()); ?>

        </div>

      <delete-notification id="<?php echo e($notification->id); ?>"></delete-notification>
      </div>
      <?php endif; ?>

      
      <?php if($notification->type === 'App\Notifications\FollowNotification'): ?> 
      <div id="<?php echo e($notification->id); ?>" class="bg-blue-200 dark:bg-gray-400 min-h-40 rounded-md shadow mb-3 p-4 flex justify-between">
        <div>
          <a href="<?php echo e(route('profile.show', $notification->data['follower']['name'])); ?>" 
            class="capitalize font-semibold text-blue-400 dark:text-gray-200"><?php echo e(str_replace('-', ' ',  $notification->data['follower']['name'])); ?></a>
            followed you  <?php echo e($notification->created_at->diffForHumans()); ?>

        </div>

        <delete-notification id="<?php echo e($notification->id); ?>"></delete-notification>
        </div>
        <?php endif; ?>

        
        <?php if($notification->type === 'App\Notifications\CommentCreated'): ?> 
        <div id="<?php echo e($notification->id); ?>" class="bg-blue-200 dark:bg-gray-400 min-h-40 rounded-md shadow mb-3 p-4 flex justify-between">
          <div>
            <a href="<?php echo e(route('profile.show', $notification->data['sender']['name'])); ?>" 
              class="capitalize font-semibold text-blue-400 dark:text-gray-200"><?php echo e(str_replace('-', ' ',  $notification->data['sender']['name'])); ?></a>
              made a comment on <a class="font-semibold text-blue-400 dark:text-gray-200" href="<?php echo e($notification->data['url']); ?>">your post</a>
              <?php echo e($notification->created_at->diffForHumans()); ?>

          </div>
          <delete-notification id="<?php echo e($notification->id); ?>"></delete-notification>
          </div>
          <?php endif; ?>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 

          <h3 class="text-center dark:text-gray-200">No new notifications yet.</h3>

          <?php endif; ?>

        </div>

      </div>

      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/notifications.blade.php ENDPATH**/ ?>