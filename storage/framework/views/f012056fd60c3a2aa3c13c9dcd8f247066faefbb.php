

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>

<create-category :categories="<?php echo e(\App\Models\Category::withCount('posts')->latest()->get()); ?>"></create-category>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/admin/category.blade.php ENDPATH**/ ?>