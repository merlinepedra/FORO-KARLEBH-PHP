

<?php $__env->startSection('title', 'edit my comment'); ?>

<?php $__env->startSection('section'); ?>

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md dark:bg-gray-400 dark:text-gray-700">
  <form action="<?php echo e(route('comment.update', $comment)); ?>" method="POST" 
  class="py-3" enctype="multipart/form-data">
  <?php echo method_field('PATCH'); ?>
  <?php echo csrf_field(); ?>

  <h1 class="text-2xl font-base text-center">Edit Comment</h1>


  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="comment" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300"><?php echo e($comment->comment); ?></textarea>
    <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  
  <div class="md:w-9/12 mx-auto mt-10 dark:bg-gray-400">
    <input 
    type="file" 
    id="photo" 
    name="images[]"
    accept="image/*" 
    multiple
    data-allow-reorder="true"
    data-max-file-size="3MB"
    data-max-files="3" class="w-full"
    >

    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>

  <div class="mt-8 md:w-9/12 mx-auto">
    <input type="submit" value="Update Comment" class="px-3 py-2 bg-gray-700 text-gray-100 dark:text-gray-200 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

<Images :images="<?php echo e($files); ?>"></Images>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/comment/edit.blade.php ENDPATH**/ ?>