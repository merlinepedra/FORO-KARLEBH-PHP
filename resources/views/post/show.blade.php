  @extends('layouts.app')

  @section('title', $post->title)

  @section('section')
  

  <div class="mx-auto w-full bg-gray-50 md:rounded-md p-6 dark:bg-gray-400 dark:text-gray-700">
    <div>
      <div>
        <h1 class="text-lg md:text-3xl font-semibold truncate">{{ $post->title }}</h1>
        <p class="font-base opacity-75 truncate">{{ $post->desc }}</p>
        <div class="grid grid-cols-2 gap-x-5 place-items-center my-10">
          @foreach($post->files as $file) 
          <img class="object-cover object-center shadow-md rounded-md" src="/storage/uploads/{{$file->file}}">
          @endforeach
        </div>
      </div>
    </div>

    <div>
      <hr id="top">

      <div class="inline-flex items-center">
        <Like
        :likeable_id="{{ $post->id }}"
        likeable_type="{{ $post::class }}"
        :user_id="{{ $post->user_id }}"
        class="mr-10"
        ></Like>

        @can('update', $post)
        <a href="{{ route('post.edit', $post) }}" class="text-gray-800 font-semibold textlg md:text-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
        </a>
        @endcan
      </div>

      @can('comment', $post)
      <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data" id="commentBox">
        @csrf
        <div id="firstChild" class="md:w-9/12 mx-auto mt-10">
          <textarea id="textarea" name="comment" placeholder="Comment here..." 
          class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300"></textarea>
          @error('comment')
          <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
          @enderror
        </div>

        <input type="hidden" name="post_id" value="{{ $post->id }}" />

        {{-- Filepond --}}
        <div class="md:w-9/12 mx-auto mt-10">
          <input 
          type="file" 
          id="photo" 
          name="images[]"
          accept="image/*" 
          multiple
          data-allow-reorder="true"
          data-max-file-size="5MB"
          data-max-files="4"
          class="w-full bg-gray-400">

          <div class="flex justify-between mt-8">
            <small class="font-semibold text-blue-500">Grab images to re-order</small>
            <small class="font-bold text-md text-gray-900 uppercase tracking-wider">max size is 5MB</small>
          </div>
        </div>

        <div class="mt-8 md:w-9/12 mx-auto">
          <input type="submit" value="Create Comment" id="sendBtn" class="px-3 py-2 bg-blue-900 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
        </div>
      </form>
      @endcan
    </div>

    <div class="mt-24"></div>
    {{ $comments->links() }}
    {{-- Comments --}}
    <section class="mt-10">
      @foreach($comments as $comment)
      <div class="border-2 rounded-md p-6 mb-4">
        <div class="mb-4">
          <small class="font-semibold mr-16">by {{ $comment->user->name }}</small> <small>{{ $comment->created_at->diffForHumans() }}</small>
        </div>

        <p class="my-5 text-lg" id="comment-{{$comment->id}}">{{ $comment->comment }}</p>

        <div class="grid md:grid-cols-2 gap-5 place-items-center truncate overflow-auto">
          @foreach($comment->files as $item)
          @if(in_array($item->extension, ['.png', '.jpg']))
          <img class="object-cover object-center h-56 shadow-md rounded-md" src="/storage/uploads/{{$item->file}}">
          @else
          <p>

          </p>
          {{ $item->file }}
          @endif
          @endforeach
        </div>

        {{-- Do not change the DOM arrangement. It is important for JS --}}
        <div>
          <div class="mt-5 inline-flex items-center">
            <Like
            :likeable_id="{{ $comment->id }}"
            likeable_type="{{ $comment::class }}"
            :user_id="{{ $comment->user_id }}"
            class="mr-10"
            ></Like>

            {{-- <a href="#top" data-parent-id="{{ $comment->id }}" v-on:click="reply" class="scrollLinks text-gray-800 font-semibold text-2xl">Reply</a> --}}
            @can('reply')
            <button title="Reply" data-parent-id="{{ $comment->id }}" v-on:click="openReplyBox" id="replyBtn" class="text-gray-800 font-semibold text-2xl mr-10">
              <svg  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
            </button>
            @endcan

            @can('update', $comment)
            <a href="{{ route('comment.edit', $comment) }}" class="text-gray-800 font-semibold text-2xl">
              <svg title="edit" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
            </a>
            @endcan
          </div>


          <div class="hidden mt-4 replyBox">
            <form action="{{ route('comment.reply') }}" method="POST" enctype="multipart/form-data">
              {{-- For locating via id --}}
              <div id="comment-{{$comment->id}}"></div>
              @csrf
              <textarea name="comment" id="" cols="30" rows="10" placeholder="Reply here" class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500"></textarea>
              <div class="mt-3">
                <input type="submit" value="Create Post" id="sendBtn" class="px-3 py-3 bg-blue-900 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
              </div>
              <input type="hidden" name="parent_id" value="{{ $comment->id }}">
              <input type="hidden" name="post_id" value="{{ $post->id }}">
            </form>
          </div>
        </div>
        {{--  --}}


        {{-- Replies --}}
        @forelse($comment->replies as $reply)
        <div class="border-2 rounded-md p-6 mt-6">
          <div class="">
            <small class="font-semibold mr-16">by {{ $reply->user->name }}</small> <small>{{ $reply->created_at->diffForHumans() }}</small>
            <p class="my-5 text-lg">{{ $reply->comment }}</p>

            <div class="grid @if($reply->files->count() > 1) grid-cols-2 gap-3 @endif place-items-center truncate overflow-auto">
              @foreach($reply->files as $item)
              @if(in_array($item->extension, ['.png', '.jpg']))
              <img class="object-cover object-center h-56" src="/storage/uploads/{{$item->file}}">
              @else
              <p>

              </p>
              {{ $item->file }}
              @endif
              @endforeach
            </div>
          </div>

          <div class="inline-flex items-center">
            <Like
            :likeable_id="{{ $reply->id }}"
            likeable_type="{{ $reply::class }}"
            :user_id="{{ $reply->user_id }}"
            class="mr-10"
            ></Like>

            @can('update', $reply)
            <a href="{{ route('comment.edit', $reply) }}" class="text-gray-800 font-semibold text-2xl">
              <svg title="Reply" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
              </svg>
            </a>
            @endcan
            
            <div id="comment-{{$reply->id}}"></div>
          </div>
        </div>
        @empty
        @endforelse

      </div>
      @endforeach
    </section>

    {{ $comments->links() }}
  </div>


  @endsection
