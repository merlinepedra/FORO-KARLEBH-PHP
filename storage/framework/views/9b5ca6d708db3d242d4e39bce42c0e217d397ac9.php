

<?php $__env->startSection('title',  str_replace('-', ' ', $profile->name)); ?>

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full bg-gray-100 rounded-md p-4">

  <div class="bg-blue-100 p-4 rounded-md">

    <div class="flex flex-col sm:flex-row justify-evenly gap-y-5 sm:gap-y-0 gap-x-5 md:gap-x-1">
      <div class="w-5/12">
        <img class="h-28 md:h-40 rounded-md" <?php if($profile->file): ?> src="/storage/uploads/<?php echo e($profile->file->file); ?>" <?php else: ?> src="/image-header.jpg" <?php endif; ?> alt="">
      </div>

      <div class="w-7/12 md:w-5/12 flex flex-col justify-between">
        <div>
          <p class="capitalize text-xl"><?php echo e(str_replace('-', ' ', $profile->name)); ?></p>
          <p class="text-gray-600 -mt-2">user</p>
        </div>

        <div class="flex rounded-md mt-4">
          <div class="bg-blue-200 px-3 py-1 rounded-l-md">
            <div class="text-xs text-gray-500">Posts</div>
            <div class="text-lg"><?php echo e($profile->user->posts->count()); ?></div>
          </div>

          <div class="bg-blue-200 px-3 py-1">
            <div class="text-xs text-gray-500">Followers</div>
            <div class="text-lg"><?php echo e($profile->followers->count()); ?></div>
          </div>

          <div class="bg-blue-200 px-3 py-1 rounded-r-md">
           <div class="text-xs text-gray-500">Comments</div>
           <div class="text-lg"><?php echo e($profile->user->comments->count()); ?></div>
         </div>
       </div>
     </div>
   </div>
   
   <?php if(auth()->id() !== $profile->id): ?>
   <div class="flex justify-center my-6">
     <Follow 
     :user_id="<?php echo e($profile->user->id); ?>"
     :follows="<?php echo e(auth()->user() ? (int) auth()->user()->following->contains($profile->user->id) : 0); ?>"
     ></Follow>
   </div>
   <?php endif; ?>

   <div class="mt-5 bg-gray-100 p-5 rounded-md">


    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
      <span class="text-sm text-gray-500">Email</span>
      <span class="text-gray-800"><?php echo e($profile->user->email); ?></span>
    </div>

    <?php if($profile->phone): ?>
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
      <span class="text-sm text-gray-500">Email</span>
      <span class="text-gray-800"><?php echo e($profile->user->email); ?></span>
    </div>
  </div>
  <?php endif; ?>

  <?php if($profile->phone): ?>
  <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
    <span class="text-sm text-gray-500">Email</span>
    <span class="text-gray-800"><?php echo e($profile->phone); ?></span>
  </div>
</div>
<?php endif; ?>

<?php if($profile->country): ?>
<div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
  <span class="text-sm text-gray-500">Email</span>
  <span class="text-gray-800"><?php echo e($profile->country); ?></span>
</div>
</div>
<?php endif; ?>

<?php if($profile->sxe): ?>
<div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
  <span class="text-sm text-gray-500">Email</span>
  <span class="text-gray-800"><?php echo e(ucfirst($profile->sex)); ?></span>
</div>
</div>
<?php endif; ?>

</div>
</div>


<div class="bg-blue-100 p-4 rounded-md">
  <?php echo $__env->make('components.posts', ['posts' => App\Models\Post::whereUserId($profile->user_id)->latest()->take(5)->get()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Jet\resources\views/profile/show.blade.php ENDPATH**/ ?>