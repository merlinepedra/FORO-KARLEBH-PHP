@extends('layouts.app')

@section('title', 'edit my comment')

@section('section')

<div class="w-full mt-5 mx-auto bg-gray-100 p-6 rounded-md dark:bg-gray-400 dark:text-gray-700">

  <form action="{{ route('comment.update', $comment) }}" method="POST" 
  class="py-3" enctype="multipart/form-data">
  @method('PATCH')
  @csrf

  <h1 class="text-2xl font-base text-center">Edit Comment</h1>


  <div class="md:w-9/12 mx-auto mt-10">
    <textarea type="text" name="comment" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300">{{ $comment->comment }}</textarea>
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
    <input type="submit" value="Update Comment" class="px-3 py-2 bg-gray-700 text-gray-100 dark:text-gray-200 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

<Images :images="{{ $files }}"></Images>

</div>
@endsection
