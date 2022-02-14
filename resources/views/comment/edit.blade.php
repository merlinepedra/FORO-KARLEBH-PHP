@extends('layouts.app')

@section('section')

<div class="max-w-3xl mt-5 mx-auto bg-gray-100 p-6">

  <form action="{{ route('comment.update', $comment) }}" method="POST" 
  enctype="multipart/form-data"
  class="py-3" enctype="multipart/form-data">
  @method('PATCH')
  @csrf

  <h1 class="text-2xl font-base text-center">Edit Comment</h1>


  <div class="w-9/12 mx-auto mt-10">
    <textarea type="text" name="comment" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500">{{ $comment->comment }}</textarea>
    @error('comment')
    <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror
  </div>

  {{-- Filepond --}}
  <div class="w-9/12 mx-auto mt-10">
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

  <div class="mt-8 w-9/12 mx-auto">
    <input type="submit" value="Update Comment" class="px-3 py-3 bg-blue-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

<Images :images="{{ $files }}"></Images>

</div>
@endsection
