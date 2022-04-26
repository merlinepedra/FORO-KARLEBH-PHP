@extends('layouts.app')

@section('title', 'search')

@section('section')

{{-- <div class="mx-auto w-full"> --}}
  
<div class="mx-auto w-full bg-gray-50 md:rounded-md p-6 mt-5 text-gray-800 dark:bg-gray-500">

  <h1 class="text-center text-gray-800 dark:text-gray-300 text-lg font-bold">{{ $results->count() }} result(s) for "{{ $item }}"</h1>

  @forelse($results as $post)
  <div class="my-4 py-4 px-2 bg-gray-50 dark:bg-gray-300 dark:text-gray-700 shadow-md rounded-md">
    <div class="flex">
       <div class="w-11/12">
        <a href="{{ route('post.show', $post) }}">
          <h1 class="lg:text-xl font-semibold truncate">{{ $post->title }}</h1>
          <p class="text-gray-600 font-base mt-3">{{ $post->desc }}</p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400 dark:bg-gray-700">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="mr-3">
          <img 
          @if(!$post->user->profile->file) src="/image-header.jpg" @else src="/storage/uploads/{{ $post->user->profile->file->file }}" @endif 
          class="w-6 h-6 object-center object-cover rounded-full" alt="image">
        </div>

        <div class="flex text-sm mr-4">
          <div class="mr-2"><span class="hidden md:inline mr-2">posted</span>by</div>

          <a href="{{ route('profile.show', $post->user->profile) }}" class="text-blue-900 font-semibold mr-2" >{{ $post->user->name }}</a>
          <span class="mr-2">in</span>
          <a href="{{ route('category.show', $post->category) }}" class="text-blue-900 font-semibold mr-2" >
            {{ $post->category }}</a>
          </div>

          <span class="text-sm">{{ $post->created_at->shortRelativeDiffForHumans() }}</span>
        </div>

        <div class="flex items-center">
         <svg class="w-6 h-6 mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <span class="text-blue-900 font-bold">{{ $post->comments_count }}</span>
      </div>
    </div>
  </div>
  @empty

  @endforelse

  {{ $results->links() }}

</div>

@endsection