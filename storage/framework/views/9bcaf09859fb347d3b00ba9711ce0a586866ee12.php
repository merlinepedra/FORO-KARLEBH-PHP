<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $__env->yieldContent('title'); ?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<div id="main">

  <body class="antialiased">
    <header class="px-6 pt-6 pb-3  bg-white dark:bg-gray-700 dark:text-gray-100 shadow-md relative">
      <div class="max-w-7xl font-semibold mx-auto">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forume.mobile-header','data' => []]); ?>
<?php $component->withName('forume.mobile-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php echo $__env->make('components.forume.desktop-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </header>
    <clip-design></clip-design>

    <div class="relative flex items-top justify-center min-h-[85vh] bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
          <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
            <?php echo $__env->yieldContent('code'); ?>
          </div>

          <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
            <?php echo $__env->yieldContent('message'); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</div>
</html>
<?php /**PATH C:\laragon\www\Jet\resources\views/errors/minimal.blade.php ENDPATH**/ ?>