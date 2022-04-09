@extends('layouts.app')

@section('title', "my comments")

@section('section')

<div class="mx-auto w-full">
  
  @forelse($comments as $comment)
  <div class="my-4 py-4 px-2 bg-gray-50 dark:bg-gray-400 dark:text-gray-700 shadow-md rounded-md">
    <div class="flex">
      <div class="w-11/12">
        <a href="{{ route('post.show', $comment->post) }}">
          <h1 class="text-xl truncate">{{ $comment->post->title }}</h1>
          <p class="text-gray-600 font-base mt-3">{{ $comment->comment }}</p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="mr-3">
          <img 
          @if(!$comment->post->user->profile->file) src="/image-header.jpg" @else src="/storage/uploads/{{ $comment->post->user->profile->file->file }}" @endif 
          class="w-6 h-6 object-center object-cover rounded-full" alt="image">
        </div>

        <div class="flex text-sm mr-4">
          <div class="mr-2"><span class="hidden md:inline mr-2">posted</span>by</div>

          <a href="{{ route('profile.show', $comment->post->user->profile) }}" class="text-blue-900 font-semibold mr-2" >{{ $comment->post->user->name }}</a>
          <span class="mr-2">in</span>
          <a href="{{ route('category.show', $comment->post->category) }}" class="text-blue-900 font-semibold mr-2" >
            {{ $comment->post->category }}</a>
          </div>

          <span class="text-sm">{{ $comment->post->created_at->shortRelativeDiffForHumans() }}</span>
        </div>

        <div class="flex items-center">
          <a class="hidden sm:block" href="{{ route('comment.edit', $comment) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" viewBox="0 0 24 24" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
          </a>
          <Like
          :likeable_id="{{ $comment->id }}"
          likeable_type="{{ $comment::class }}"
          :user_id="{{ $comment->user_id }}"
          class="mr-10"
          ></Like>
        </div>
      </div>
    </div>
    @empty

    <h1 class="text-center text-gray-800 dark:text-gray-200">No Answers Yet.</h1>

    @endforelse

  </div>

  {{ $comments->links() }}
  @endsection
