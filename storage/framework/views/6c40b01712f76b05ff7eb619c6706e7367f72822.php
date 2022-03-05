<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name', 'Laravel')); ?></title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

  <!-- Scripts -->
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<body class="bg-gray-200">
  <div id="main" v-cloak>
    <header class="p-6 bg-gray-100 shadow-sm dark:bg-gray-700 dark:text-gray-100">
    
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

    <main class="font-sans antialiased mx-auto">
      <div class="mx-auto max-w-[1500px] grid md:grid-cols-5">

        <div class="bg-gray-400 w-auto md:min-h-[87.8vh] px-4 hidden md:block" id="adminMobileNav">
          <div class="grid my-7">
            <a href="<?php echo e(route('admin.home')); ?>" class="font-semibold bg-gray-200 px-5 py-3 rounded-md <?php if(request()->routeIs('admin.home')): ?> bg-gray-800 text-gray-100 <?php endif; ?>">Overview</a>
            <a href="<?php echo e(route('admin.makeAdmin.create')); ?>" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.makeAdmin.create')): ?> bg-gray-800 text-gray-100 <?php endif; ?>">Users</a>
            <a href="<?php echo e(route('admin.posts')); ?>" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.posts')): ?> bg-gray-800 text-gray-100 <?php endif; ?>">Posts</a>
            <a href="<?php echo e(route('admin.comments')); ?>" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.comments')): ?> bg-gray-800 text-gray-100 <?php endif; ?>">Comment</a>
            <a href="<?php echo e(route('admin.categories')); ?>" class="font-semibold bg-gray-200 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.categories')): ?> bg-gray-800 text-gray-100 <?php endif; ?>">Categories</a>

            <?php echo $__env->yieldContent('links'); ?>
          </div>
        </div>

        
        <div class="bg-gray-200 w-auto p-4 mt-3 md:col-span-4 grid gap-7">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>

    </main>
  </div>
  <script>
    let theme = localStorage.getItem('theme')
    let htmlClasses = document.querySelector('html').classList

    if (theme == 'dark') {
      htmlClasses.add('dark')
    } else {
      htmlClasses.remove('dark')
    }

    document.getElementById('switch')
    .addEventListener('click', () => {
      htmlClasses.toggle('dark')

      if (localStorage.hasOwnProperty('theme')) {
        localStorage.removeItem('theme')
      } else {
        localStorage.theme = 'dark'
      }
    })
  </script>
</body>
</html>
<?php /**PATH C:\laragon\www\Jet\resources\views/layouts/admin.blade.php ENDPATH**/ ?>