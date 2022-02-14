@extends('layouts.app')

@section('section')
<div class="max-w-3xl mt-5 mx-auto bg-gray-100 p-6">

  <form action="{{ route('post.store') }}" method="POST" 
  enctype="multipart/form-data"
  class="py-3" enctype="multipart/form-data">
  @csrf

  <h1 class="text-2xl font-base text-center">Create Posts</h1>

  <div class="mt-10 w-9/12 mx-auto">
    <input type="text" 
    name="title" placeholder="Title here..." class="w-full rounded-md focus:ring-0 focus:border-purple-500" 
    value="{{ old('title') }}">
    @error('title')
    <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror

  </div>


  <div class="w-9/12 mx-auto mt-10">
    <select name="category_id" class="w-full rounded-md focus:ring-0 focus:border-purple-500">
      <option value="">Select a category</option>
      @forelse($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @empty
      <option>No Category</option>
      @endforelse
    </select>
     @error('category_id')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
    @enderror
  </div>

  <div class="w-9/12 mx-auto mt-10">
    <textarea type="text" name="desc" placeholder="Description here..." 
    class="w-full rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500" value="old('desc')"></textarea>
     @error('desc')
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
  </div>

  <div class="mt-8 w-9/12 mx-auto">
    <input type="submit" value="Create Post" class="px-3 py-3 bg-gray-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
  </div>

</form>

</div>
<br>
<br>
<br>
@endsection
