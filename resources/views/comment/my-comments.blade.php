@extends('layouts.app')

@section('title', "my comments")

@section('section')

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md">
 @forelse($comments as $comment)

 <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">
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

@endforelse

</div>
@endsection
