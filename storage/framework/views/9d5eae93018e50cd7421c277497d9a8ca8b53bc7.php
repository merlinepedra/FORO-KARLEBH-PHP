
<?php $__env->startSection('title', 'account settings'); ?>
<?php $__env->startSection('section'); ?>
<div class="grid justify-center items-center w-full bg-gray-100 rounded-md dark:bg-gray-700">

  <div class="p-6">

    <div class="grid grid-rows-2">

      <div class="grid grid-cols-2">
        <div class="text-sm text-blue-900 font-semibold dark:text-gray-200">Like Notification</div>
        <custom-checkbox 
        url="<?php echo e(route('like-setting', auth()->id())); ?>"
        :toggle="<?php echo e(auth()->user()->setting->like_notifiable ? 1 : 0); ?>"></custom-checkbox>
      </div>

      <div class="text-blue-600 text-sm mt-3 italic dark:text-gray-200">Turn on or off this button to switch between getting like notifications for your posts and comments</div>
    </div>
    
    <div class="grid grid-rows-2 mt-20">

     <div class="grid grid-cols-2">
      <div class="text-sm text-blue-900 font-semibold dark:text-gray-200">Comment Notification</div>
      <custom-checkbox 
      url="<?php echo e(route('comment-setting', auth()->id())); ?>"
      :toggle="<?php echo e(auth()->user()->setting->comment_notifiable ? 1 : 0); ?>"></custom-checkbox>
    </div>

    <div class="text-blue-600 text-sm mt-3 italic dark:text-gray-200">Turn on or off this button to switch between getting notifications for the comments to your posts</div>
  </div>

  <div class="grid grid-rows-2 mt-20">
    <div class="grid grid-cols-2">
      <div class="text-sm text-blue-900 font-semibold dark:text-gray-200">Follow Notification</div>
      <custom-checkbox 
      url="<?php echo e(route('follow-setting', auth()->id())); ?>"
      :toggle="<?php echo e(auth()->user()->setting->follow_notifiable ? 1 : 0); ?>"
      ></custom-checkbox>
    </div>

    <div class="text-blue-600 text-sm mt-3 italic dark:text-gray-200">Turn on or off this button to switch between getting notifications for follows by other users</div>
  </div>
</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/settings.blade.php ENDPATH**/ ?>