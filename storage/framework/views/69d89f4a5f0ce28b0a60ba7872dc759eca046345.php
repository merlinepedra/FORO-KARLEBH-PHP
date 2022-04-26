

<?php $__env->startSection('title', 'reply comment'); ?>

<?php $__env->startSection('section'); ?>

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md dark:bg-gray-400 dark:text-gray-700">

 <section class="mt-10">
  <div class="border-2 rounded-md p-6 mb-4">
    <div class="mb-4">
      <h1 class="text-2xl font-semibold">
        <?php echo e($comment->post->title); ?>

      </h1>
    </div>

    <div class="mb-4">
      <small class="font-semibold mr-16">by <?php echo e($comment->user->name); ?></small>
      <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
    </div>

    <p class="my-5 text-lg" id="comment-<?php echo e($comment->id); ?>"><?php echo e($comment->comment); ?></p>

    <div>
      <div class="mt-5 flex items-center">
        <Like :likeable_id="<?php echo e($comment->id); ?>" likeable_type="<?php echo e($comment::class); ?>"
          :user_id="<?php echo e($comment->user_id); ?>" class="mr-8"></Like>
        </div>
      </div>
    </div>
  </section>

  <form action="<?php echo e(route('reply.store')); ?>" method="POST" 
  class="py-3" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>

  <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>">
  <input type="hidden" name="post_id" value="<?php echo e($comment->post->id); ?>">

  <h1 class="text-2xl font-base text-center">Reply Comment</h1>


  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="comment" placeholder="Reply here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:bg-gray-300">
  </textarea>
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
  <input type="submit" value="Reply Comment" 
  class="px-3 py-2 bg-gray-700 text-gray-100 dark:text-gray-200 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
</div>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/comment/reply.blade.php ENDPATH**/ ?>