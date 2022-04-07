@extends('layouts.app')

@section('title', 'create a topic')

@section('section')

<div class="mx-auto w-full bg-gray-50 md:rounded-md p-6 text-gray-800 dark:bg-gray-500">

 <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" 
 class=" dark:text-gray-700">
      @csrf

      <h1 class="text-2xl font-base text-center dark:text-gray-200">Create Post</h1>

      <div class="mt-10 md:w-9/12 mx-auto">
        <input type="text" 
        name="title" placeholder="Title here..." 
        class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-400 dark:text-gray-300" 
        value="{{ old('title') }}">
        @error('title')
        <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
        @enderror

      </div>


      <div class="md:w-9/12 mx-auto mt-10">
        <select name="category_id" class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md focus:ring-0 focus:border-purple-500 dark:bg-gray-400 dark:text-gray-300">
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

      <div class="md:w-9/12 mx-auto mt-10">
        <textarea type="text" name="desc" placeholder="Description here..." 
        class="w-full placeholder-gray-800 dark:placeholder-gray-300 rounded-md resize-none h-40 focus:ring-0 focus:border-purple-500 dark:bg-gray-400 dark:text-gray-300" value="old('desc')"></textarea>
        @error('desc')
        <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
        @enderror
      </div>

      {{-- Filepond --}}
      <div class="md:w-9/12 mx-auto mt-10 dark:bg-gray-400 dark:text-gray-300">
        <input 
        type="file" 
        id="photo" 
        name="images[]"
        accept="image/*" 
        multiple
        data-allow-reorder="true"
        data-max-file-size="3MB"
        data-max-files="3"
        >
      </div>

      <div class="mt-8 md:w-9/12 mx-auto">
        <input type="submit" value="Create Post" 
        class="px-3 py-3 bg-gray-700 text-gray-100 dark:text-gray-300 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
      </div>

    </form>
</div>


@endsection