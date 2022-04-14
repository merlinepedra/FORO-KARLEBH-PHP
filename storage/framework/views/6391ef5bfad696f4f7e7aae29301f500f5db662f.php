
<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Forume -  Admin</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

  <!-- Scripts -->
  <script>
    window.matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', e => {
      if (localStorage.theme === 'system') {
        if (e.matches) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      }
    });

    function updateTheme() {
      if (!('theme' in localStorage)) {
        localStorage.theme = 'light';
      }

      switch (localStorage.theme) {
        case 'system':
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
        document.documentElement.setAttribute('color-theme', 'system');
        break;

        case 'dark':
        document.documentElement.classList.add('dark');
        document.documentElement.setAttribute('color-theme', 'dark');
        break;

        case 'light':
        document.documentElement.classList.remove('dark');
        document.documentElement.setAttribute('color-theme', 'light');
        break;
      }
    }

    updateTheme()
  </script>

  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<body class="bg-gray-200 dark:bg-gray-400">
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

     <main class="font-sans antialiased">
      <div class="mx-auto max-w-[1600px] grid md:grid-cols-5">

        <div class="bg-gray-400 dark:bg-gray-500 md:min-h-[88.3vh] px-4 hidden md:block" id="adminMobileNav">
          <div class="grid my-7">
            <a href="<?php echo e(route('admin.home')); ?>" class="font-semibold bg-gray-200 dark:bg-gray-400 px-5 py-3 rounded-md <?php if(request()->routeIs('admin.home')): ?> bg-gray-800 dark:bg-gray-800 text-gray-100 <?php endif; ?>">Overview</a>
            <a href="<?php echo e(route('admin.makeAdmin.create')); ?>" class="font-semibold bg-gray-200 dark:bg-gray-400 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.makeAdmin.create')): ?> bg-gray-800 dark:bg-gray-800 text-gray-100 <?php endif; ?>">Users</a>
            <a href="<?php echo e(route('admin.posts')); ?>" class="font-semibold bg-gray-200 dark:bg-gray-400 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.posts')): ?> bg-gray-800 dark:bg-gray-800 text-gray-100 <?php endif; ?>">Posts</a>
            <a href="<?php echo e(route('admin.comments')); ?>" class="font-semibold bg-gray-200 dark:bg-gray-400 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.comments')): ?> bg-gray-800 dark:bg-gray-800 text-gray-100 <?php endif; ?>">Comment</a>
            <a href="<?php echo e(route('admin.categories')); ?>" class="font-semibold bg-gray-200 dark:bg-gray-400 px-5 py-3 rounded-md mt-4 <?php if(request()->routeIs('admin.categories')): ?> bg-gray-800 dark:bg-gray-800 text-gray-100 <?php endif; ?>">Categories</a>

            <?php echo $__env->yieldContent('links'); ?>
          </div>
        </div>

        
        <div class="w-auto p-4 mt-3 md:col-span-4 grid gap-7">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>

    </main>

  </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Forume\resources\views/layouts/admin.blade.php ENDPATH**/ ?>