@extends('layouts.app')
@section('title', 'categories')

@section('section')
<div class="mx-auto w-full">
  @forelse($categories as $category)
  <div class="my-4 p-4 bg-gray-50 shadow-md rounded-md dark:text-gray-700 dark:bg-gray-400">
    <div class="flex">
     <div class="w-11/12">
      <a href="{{ route('category.show', $category) }}">
        <h1 class="lg:text-xl font-semibold truncate">{{ $category->name }}</h1>
        <p class="text-gray-600 font-base mt-3">{{ $category->desc ?? "A Cool place to have fun!" }}</p>
      </a>
    </div>
  </div>

  <hr class="my-2 bg-gray-400">

  <div class="w-full py-1 flex justify-between items-center">
    <div class="flex justify-center">

      <span class="text-sm"><span class="mr-3">created by Superuser</span>{{ $category->created_at->DiffForHumans() }}</span>
    </div>

    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="text-blue-900 font-bold">{{ $category->posts_count }}</span>
    </div>
  </div>
</div>
@empty

<h1 class="text-center">No Posts Yet <a href="{{ route('post.create') }}" class="ml-4 text-blue-900 font-semibold">Create a Topic</a></h1>

@endforelse

</div>

{{ $categories->links() }}
@endsection
