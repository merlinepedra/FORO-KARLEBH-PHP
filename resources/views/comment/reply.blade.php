@extends('layouts.app')

@section('title', 'reply comment')

@section('section')

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md dark:bg-gray-400 dark:text-gray-700">

 <section class="mt-10">
  <div class="border-2 rounded-md p-6 mb-4">
    <div class="mb-4">
      <h1 class="text-2xl font-semibold">
        {{ $comment->post->title }}
      </h1>
    </div>

    <div class="mb-4">
      <small class="font-semibold mr-16">by {{ $comment->user->name }}</small>
      <small>{{ $comment->created_at->diffForHumans() }}</small>
    </div>

    <p class="my-5 text-lg" id="comment-{{ $comment->id }}">{{ $comment->comment }}</p>

    <div>
      <div class="mt-5 flex items-center">
        <Like :likeable_id="{{ $comment->id }}" likeable_type="{{ $comment::class }}"
          :user_id="{{ $comment->user_id }}" class="mr-8"></Like>
        </div>
      </div>
    </div>
  </section>

  <form action="{{ route('reply.store') }}" method="POST" 
  class="py-3" enctype="multipart/form-data">
  @csrf

  <input type="hidden" name="parent_id" value="{{ $comment->id }}">
  <input type="hidden" name="post_id" value="{{ $comment->post->id }}">

  <h1 class="text-2xl font-base text-center">Reply Comment</h1>


  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="comment" placeholder="Reply here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:bg-gray-300">
  </textarea>
  @error('comment')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

{{-- Filepond --}}
<div class="md:w-9/12 mx-auto mt-10 dark:bg-gray-400">
  <input 
  type="file" 
  id="photo" 
  name="images[]"
  accept="image/*" 
  multiple
  data-allow-reorder="true"
  data-max-file-size="3MB"
  data-max-files="3" class="w-full"
  >

  @error('images')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

<div class="mt-8 md:w-9/12 mx-auto">
  <input type="submit" value="Reply Comment" 
  class="px-3 py-2 bg-gray-700 text-gray-100 dark:text-gray-200 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
</div>

</form>
</div>
@endsection
