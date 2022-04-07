
<?php $__env->startSection('title', 'all users'); ?>


<?php $__env->startSection('section'); ?>

<div class="mx-auto w-full place-items-center bg-gray-50 rounded-md py-10 px-6 dark:bg-gray-500">

  <div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="mt-4 flex justify-between px-8">

      <span class="">
        <a class="text-blue-500 dark:text-gray-200 font-semibold" href="<?php echo e(route('profile.show', $user->name)); ?>"><?php echo e($user->name); ?></a>
      </span>

      <span class="dark:text-gray-200">Joined <span class="font-semibold"><?php echo e($user->created_at->diffForHumans()); ?></span></span>

      <Follow 
      :user_id="<?php echo e($user->id); ?>"
      :follows="<?php echo e(auth()->user() ? (int) auth()->user()->following->contains($user->id) : 0); ?>"
      ></Follow>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
  <br>
  <?php echo e($users->links()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/users.blade.php ENDPATH**/ ?>