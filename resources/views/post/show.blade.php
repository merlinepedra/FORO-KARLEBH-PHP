  @extends('layouts.app')

  @section('title', $post->title)

  @section('section')

  {{-- <div id="editor"></div>              --}}


  <div class="mx-auto w-full bg-gray-50 rounded-md p-6 dark:bg-gray-400 dark:text-gray-700">
    <div>
      <div>
        <h1 class="text-lg md:text-3xl font-semibold truncate">{{ $post->title }}</h1>
        <p class="font-base opacity-75 truncate">{{ $post->desc }}</p>
        <div class="grid grid-cols-2 gap-x-5 place-items-center my-10">
          @foreach ($post->files as $file)
          @if (\Illuminate\Support\Facades\App::environment('production'))
          <img class="object-cover object-center shadow-md rounded-md"
          src="/uploads/{{ $file->file_url }}">
          @else
          <img class="object-cover object-center shadow-md rounded-md"
          src="/uploads/{{ $file->file }}">
          @endif
          @endforeach
        </div>
      </div>
    </div>

    <div>
      <hr id="top">

      <div class="flex items-center mt-2">

        <Like :likeable_id="{{ $post->id }}" likeable_type="{{ $post::class }}"
          :user_id="{{ $post->user_id }}" class="mr-10"></Like>

          @can('update', $post)
          <a href="{{ route('post.edit', $post) }}" class="text-gray-800 font-semibold textlg md:text-2xl mr-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
              <path
              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
          </a>
          @endcan

          <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <span class="text-blue-900 font-bold">
            {{ $post->views }}
          </span>
        </div>
      </div>

      @can('comment', $post)
      <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data" id="commentBox">
        @csrf
        <div id="firstChild" class="md:w-9/12 mx-auto mt-10">
          <textarea id="textarea" name="comment" placeholder="Comment here..."
          class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300"></textarea>
          @error('comment')
          <div
          class="text-sm text-red-500 dark:text-gray-200 dark:py-3 dark:pl-3 dark:rounded-md dark:bg-red-500 justify-end">
        {{ $message }}</div>
        @enderror
      </div>

      <input type="hidden" name="post_id" value="{{ $post->id }}" />

      {{-- Filepond --}}
      <div class="md:w-9/12 mx-auto mt-10">
        <input type="file" id="photo" name="images[]" accept="image/*" multiple data-allow-reorder="true"
        data-max-file-size="5MB" data-max-files="4" class="w-full bg-gray-400">

        <div class="flex justify-between mt-8">
          <small class="font-semibold text-blue-500 dark:text-blue-900">Grab images to re-order</small>
          <small class="font-bold text-md text-gray-900 uppercase tracking-wider">max size is 5MB</small>
        </div>
      </div>

      <div class="mt-8 md:w-9/12 mx-auto">
        <input type="submit" value="Create Comment" id="sendBtn"
        class="px-3 py-2 bg-blue-900 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
      </div>
    </form>
    @endcan
  </div>

  <div class="mt-24"></div>
  {{ $comments->links() }}
  {{-- Comments --}}
  <section class="mt-10">
    @foreach ($comments as $comment)
    <div class="border-2 rounded-md p-6 mb-4">
      <div class="mb-4">
        <small class="font-semibold mr-16">by {{ $comment->user->name }}</small>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
      </div>

      <p class="my-5 text-lg" id="comment-{{ $comment->id }}">{{ $comment->comment }}</p>

      <div class="grid md:grid-cols-2 gap-5 place-items-center truncate overflow-auto">
        @foreach ($comment->files as $file)
        @if (in_array($file->extension, ['.png', '.jpg']))
        @if (\Illuminate\Support\Facades\App::environment('production'))
        <img class="object-cover object-center shadow-md rounded-md"
        src="/uploads/{{ $file->file_url }}">
        @else
        <img class="object-cover object-center shadow-md rounded-md"
        src="/uploads/{{ $file->file }}">
        @endif
        @else
        <p>

        </p>
        {{ $file->file }}
        @endif
        @endforeach
      </div>

      {{-- Do not change the DOM arrangement. It is important for JS --}}
      <div>
        <div class="mt-5 flex items-center">
          <Like :likeable_id="{{ $comment->id }}" likeable_type="{{ $comment::class }}"
            :user_id="{{ $comment->user_id }}" class="mr-8"></Like>

            {{-- <a href="#top" data-parent-id="{{ $comment->id }}" v-on:click="reply" class="scrollLinks text-gray-800 font-semibold text-2xl">Reply</a> --}}
            @can('reply', $comment)
            <div class="flex mr-10">
              <a href="{{ route('reply.create', $comment) }}" data-parent-id="{{ $comment->id }}"
                id="replyBtn" class="text-gray-800 font-semibold text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
            @endcan

            @can('update', $comment)
            <div class="flex mr-8">
              <a href="{{ route('comment.edit', $comment) }}"
              class="text-gray-800 font-semibold text-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
            </a>
          </div>
          @endcan
        </div>

        {{-- Replies --}}
        @forelse($comment->replies as $reply)
        <div class="border-2 rounded-md p-6 mt-6">
          <div class="">
            <small class="font-semibold mr-16">by {{ $reply->user->name }}</small>
            <small>{{ $reply->created_at->diffForHumans() }}</small>
            <p class="my-5 text-lg">{{ $reply->comment }}</p>

            <div
            class="grid @if ($reply->files->count() > 1) grid-cols-2 gap-3 @endif place-items-center truncate overflow-auto">
            @foreach ($reply->files as $item)
            @if (in_array($item->extension, ['.png', '.jpg']))
            <img class="object-cover object-center h-56"
            src="/uploads/{{ $item->file }}">
            @else
            <p>

            </p>
            {{ $item->file }}
            @endif
            @endforeach
          </div>
        </div>

        <div class="inline-flex">
          <Like :likeable_id="{{ $reply->id }}" likeable_type="{{ $reply::class }}"
            :user_id="{{ $reply->user_id }}" class="mr-10"></Like>

            @can('update', $reply)
            <div class="flex">
              <a href="{{ route('comment.edit', $reply) }}"
              class="text-gray-800 font-semibold text-2xl">
              <svg title="Reply" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1"
              viewBox="0 0 20 20" fill="currentColor">
              <path
              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
          </a>
        </div>
        @endcan
      </div>

      <div id="comment-{{ $reply->id }}"></div>
    </div>
    @empty
    @endforelse

  </div>
  @endforeach
</section>

{{ $comments->links() }}
</div>


@endsection
