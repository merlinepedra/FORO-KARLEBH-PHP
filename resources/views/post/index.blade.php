@extends('layouts.app')

@section('section')



<div class="mx-auto max-w-3xl">

  @forelse($posts as $post)
  {{-- <a href="{{ route('post.show', $post) }}"> --}}
    <div class="my-4 p-4 bg-gray-50 shadow md:rounded-md">
      <div class="flex">
       <Vote
       :likeable_id="{{ $post->id }}"
       likeable_type="{{ $post::class }}"
       :user_id="{{ $post->user_id }}"
       class="w-1/12 mx-auto"
       ></Vote>
       <div class="w-11/12">
        <a href="{{ route('post.show', $post) }}">
          <h1 class="lg:text-3xl font-semibold truncate">{{ $post->title }}</h1>
          <p class="text-gray-600 font-base mt-3">{{ $post->desc }}</p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="mr-3">
          <img 
          @if(!$post->user->profile->file) src="/image-header.jpg" @else src="/storage/uploads/{{ $post->user->profile->file->file }}" @endif 
          class="w-6 h-6 object-center object-cover rounded-full" alt="image">
        </div>

        <div class="flex text-sm mr-4">
          <span class="mr-2">posted by</span>
          <a href="{{ route('profile.show', $post->user->profile) }}" class="text-blue-900 font-semibold" >{{ $post->user->name }}</a>
        </div>

        <span class="text-sm">{{ $post->created_at->shortRelativeDiffForHumans() }}</span>
      </div>

      <div class="flex items-center">
        <svg class="mr-1" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.767L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.233V16H4V4h16v12z"/></svg>
        <span>{{ $post->comments_count }}</span>
      </div>
    </div>
  </div>
{{-- </a> --}}
@empty

<h1>No Posts Yet</h1>

@endforelse

</div>


@endsection