@extends('layouts.app')

@section('title', 'my topics')

@section('section')

<div class=" mx-auto w-full">

  @forelse($posts as $post)
  <div class="my-4 p-4 bg-gray-50 shadow-md rounded-md dark:bg-gray-700 dark:text-gray-300">
    <div class="flex">
      <div class="w-11/12">
        <a href="{{ route('post.show', $post) }}">
          <h1 class="lg:text-xl font-semibold truncate">{{ $post->title }}</h1>
          <p class="text-gray-600 dark:text-gray-400 font-base mt-3">{{ $post->desc }}</p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="mr-3">
          <img @if(!$post->user->profile->file) src="/image-header.jpg" @else src="/storage/uploads/{{ $post->user->profile->file->file }}" @endif
          class="w-6 h-6 object-center object-cover rounded-full" alt="image">
        </div>

        <div class="flex text-sm mr-4">
          <span class="mr-2">posted by</span>
          <a href="{{ route('profile.show', $post->user->profile) }}" class="text-blue-900 dark:text-gray-400 font-semibold mr-2">{{ $post->user->name }}</a>
          <span class="mr-2">in</span>
          <a href="{{ route('category.show', $post->category) }}" class="text-blue-900 dark:text-gray-400 font-semibold mr-2">
            {{ $post->category }}</a>
        </div>

        <span class="text-sm">{{ $post->created_at->shortRelativeDiffForHumans() }}</span>
      </div>

      <div class="flex items-center">
        <a class="hidden md:block" href="{{ route('post.edit', $post)}}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-6" viewBox="0 0 24 24" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
          </svg>
        </a>
        <svg class="mr-1" width="20px" height="20px" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z" />
        </svg>
        <span class="text-blue-900 font-bold">{{ $post->comments_count > 0 ? $post->comments_count : '' }}</span>
      </div>
    </div>
  </div>
  @empty

  <h1 class="text-center dark:text-gray-200">No Posts Yet</h1>

  @endforelse

  {{ $posts->links() }}

</div>


@endsection