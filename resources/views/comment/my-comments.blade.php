@extends('layouts.app')

@section('title', "my comments")

@section('section')

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md">
 @forelse($comments as $comment)

 <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">
  <div class="flex">
   <div class="w-11/12">
    <a href="{{ route('post.show', $comment->post) }}">
      <div class="flex">
        <small class="mr-3">comment: </small>
        <h1 class="lg:text-xl font-semibold truncate">{{ $comment->comment }}</h1>
      </div>
      <p class="text-gray-600 font-base mt-3">{{ $comment->post->title }}</p>
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
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
      </svg>
      <span>{{ $comment->likes->count() }}</span>
    </div>
  </div>
</div>
@empty

@endforelse

</div>
@endsection
