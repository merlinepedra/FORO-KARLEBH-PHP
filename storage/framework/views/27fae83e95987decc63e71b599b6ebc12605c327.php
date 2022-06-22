  

  <?php $__env->startSection('title', $post->title); ?>

  <?php $__env->startSection('section'); ?>

  


  <div class="mx-auto w-full bg-gray-50 rounded-md p-6 dark:bg-gray-700 dark:text-gray-300">
    <div>
      <div>
        <h1 class="text-lg md:text-3xl font-semibold truncate"><?php echo e($post->title); ?></h1>
        <p class="font-base opacity-75 truncate"><?php echo e($post->desc); ?></p>
        <div class="grid grid-cols-2 gap-x-5 place-items-center my-10">
          <?php $__currentLoopData = $post->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(\Illuminate\Support\Facades\App::environment('production')): ?>
          <img class="object-cover object-center shadow-md rounded-md" src="/uploads/<?php echo e($file->file_url); ?>">
          <?php else: ?>
          <img class="object-cover object-center shadow-md rounded-md" src="/uploads/<?php echo e($file->file); ?>">
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>

    <div>
      <hr id="top" class="bg-gray-600 text-gray-600" color="blue" noshade>

      <div class="flex items-center mt-2">

        <Like :likeable_id="<?php echo e($post->id); ?>" likeable_type="<?php echo e($post::class); ?>" :user_id="<?php echo e($post->user_id); ?>" class="mr-10"></Like>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
        <a href="<?php echo e(route('post.edit', $post)); ?>" class="font-semibold textlg md:text-2xl mr-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
        </a>
        <?php endif; ?>

        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <span class="text-blue-900 dark:text-gray-400 font-bold">
            <?php echo e($post->views); ?>

          </span>
        </div>
      </div>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comment', $post)): ?>
      <form action="<?php echo e(route('comment.store')); ?>" method="POST" enctype="multipart/form-data" id="commentBox">
        <?php echo csrf_field(); ?>
        <div id="firstChild" class="md:w-9/12 mx-auto mt-10">
          <textarea id="textarea" name="comment" placeholder="Comment here..." class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600"></textarea>
          <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <div class="text-sm text-red-500 dark:text-gray-200 dark:py-3 dark:pl-3 dark:rounded-md dark:bg-red-500 justify-end">
            <?php echo e($message); ?>

          </div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>" />

        
        <div class="md:w-9/12 mx-auto mt-10">
          <input type="file" id="photo" name="images[]" accept="image/*" multiple data-allow-reorder="true" data-max-file-size="5MB" data-max-files="4" class="w-full bg-gray-400">

          <div class="flex justify-between mt-8">
            <small class="font-semibold text-blue-500 dark:text-gray-400">Grab images to re-order</small>
            <small class="font-bold text-md text-gray-900 dark:text-gray-300 uppercase tracking-wider">max size is 5MB</small>
          </div>
        </div>

        <div class="mt-8 md:w-9/12 mx-auto">
          <input type="submit" value="Create Comment" id="sendBtn" class="px-3 py-3 bg-blue-900 dark:bg-blue-800 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 dark:focus:border-0 font-semibold">
        </div>
      </form>
      <?php endif; ?>
    </div>

    <div class="mt-24"></div>
    <?php echo e($comments->links()); ?>

    
    <section class="mt-10">
      <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="border-2 rounded-md p-6 mb-4">
        <div class="mb-4">
          <small class="font-semibold mr-16">by <?php echo e($comment->user->name); ?></small>
          <small><?php echo e($comment->created_at->diffForHumans()); ?></small>
        </div>

        <p class="my-5 text-lg" id="comment-<?php echo e($comment->id); ?>"><?php echo e($comment->comment); ?></p>

        <div class="grid md:grid-cols-2 gap-5 place-items-center truncate overflow-auto">
          <?php $__currentLoopData = $comment->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(in_array($file->extension, ['.png', '.jpg'])): ?>
          <?php if(\Illuminate\Support\Facades\App::environment('production')): ?>
          <img class="object-cover object-center shadow-md rounded-md" src="/uploads/<?php echo e($file->file_url); ?>">
          <?php else: ?>
          <img class="object-cover object-center shadow-md rounded-md" src="/uploads/<?php echo e($file->file); ?>">
          <?php endif; ?>
          <?php else: ?>
          <p>

          </p>
          <?php echo e($file->file); ?>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div>
          <div class="mt-5 flex items-center">
            <Like :likeable_id="<?php echo e($comment->id); ?>" likeable_type="<?php echo e($comment::class); ?>" :user_id="<?php echo e($comment->user_id); ?>" class="mr-8"></Like>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply', $comment)): ?>
            <div class="flex mr-10">
              <a href="<?php echo e(route('reply.create', $comment)); ?>" data-parent-id="<?php echo e($comment->id); ?>" id="replyBtn" class="text-gray-800 font-semibold text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $comment)): ?>
            <div class="flex mr-8">
              <a href="<?php echo e(route('comment.edit', $comment)); ?>" class="text-gray-800 font-semibold text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
              </a>
            </div>
            <?php endif; ?>
          </div>

          
          <?php $__empty_1 = true; $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="border-2 rounded-md p-6 mt-6">
            <div class="">
              <small class="font-semibold mr-16">by <?php echo e($reply->user->name); ?></small>
              <small><?php echo e($reply->created_at->diffForHumans()); ?></small>
              <p class="my-5 text-lg"><?php echo e($reply->comment); ?></p>

              <div class="grid <?php if($reply->files->count() > 1): ?> grid-cols-2 gap-3 <?php endif; ?> place-items-center truncate overflow-auto">
                <?php $__currentLoopData = $reply->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(in_array($item->extension, ['.png', '.jpg'])): ?>
                <img class="object-cover object-center h-56" src="/uploads/<?php echo e($item->file); ?>">
                <?php else: ?>
                <p>

                </p>
                <?php echo e($item->file); ?>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>

            <div class="inline-flex">
              <Like :likeable_id="<?php echo e($reply->id); ?>" likeable_type="<?php echo e($reply::class); ?>" :user_id="<?php echo e($reply->user_id); ?>" class="mr-10"></Like>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $reply)): ?>
              <div class="flex">
                <a href="<?php echo e(route('comment.edit', $reply)); ?>" class="text-gray-800 font-semibold text-2xl">
                  <svg title="Reply" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg>
                </a>
              </div>
              <?php endif; ?>
            </div>

            <div id="comment-<?php echo e($reply->id); ?>"></div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <?php endif; ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo e($comments->links()); ?>

  </div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/post/show.blade.php ENDPATH**/ ?>