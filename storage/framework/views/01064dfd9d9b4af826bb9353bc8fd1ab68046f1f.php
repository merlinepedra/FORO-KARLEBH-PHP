

<?php $__env->startSection('title', 'edit your post'); ?>

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full bg-gray-100 p-6 mt-5 rounded-md dark:bg-gray-500 dark:text-gray-700">


  <form action="<?php echo e(route('post.update', $post)); ?>" method="POST" enctype="multipart/form-data" class="py-3" enctype="multipart/form-data">
    <?php echo method_field('PATCH'); ?>
    <?php echo csrf_field(); ?>

    <h1 class="text-2xl font-base text-center">Update Post</h1>

    <div class="mt-10 md:w-9/12 mx-auto">
      <input type="text" 
      name="title" placeholder="Title here..."  
      class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-400 dark:text-gray-300" 
      value="<?php echo e($post->title); ?>">
      <?php $__errorArgs = ['title'];
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


    <div class="md:w-9/12 mx-auto mt-10">
      <select name="category_id" 
      class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-400 dark:text-gray-300">
      <option value="">Select a category</option>
      <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <option <?php if($post->category_id === $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <option>No Category</option>
      <?php endif; ?>
    </select>
    <?php $__errorArgs = ['category_id'];
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

  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="desc" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-400 dark:text-gray-300"><?php echo e($post->desc); ?></textarea>
    <?php $__errorArgs = ['desc'];
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

  
  <div class="md:w-9/12 mx-auto mt-10">
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
  </div>

  <div class="mt-8 md:w-9/12 mx-auto">
    <input type="submit" value="Update Post" class="px-3 py-2 bg-gray-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

<Images :images="<?php echo e($files); ?>"></Images>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/post/edit.blade.php ENDPATH**/ ?>