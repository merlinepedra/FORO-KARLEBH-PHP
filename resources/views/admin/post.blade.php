@extends('layouts.admin')

@section('content')

<change-title v-if="changeTitle" v-on:close="changeTitle = false"></change-title>

<div>

  <div class="flex justify-between items-center">

    <div>
      <h1 class="text-2xl">Posts ({{ $posts->count() }})</h1>
    </div>

    <a href="{{ route('post.create') }}">
      <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md w-48">
        <span class="text-lg">+</span>
        <span class="ml-2">Start a New Topic</span>
      </div>
    </a>
  </div>

  <div style="height: .05rem;" class="bg-gray-400 mb-3"></div>

  <div class="grid md:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow">
    <div>Title</div>
    <div>Views</div>
    <div>Comments</div>
    <div>Category</div>
    <div>
      <div class="flex justify-center">
        Actions
      </div>
    </div>
  </div>

  @forelse($posts as $post)
  <div class="grid md:grid-cols-5 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-md shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
    <div>
      <h4>
        {{ $post->title }}

      </h4>
    </div>

    <div>
      {{ $post->views }} views
    </div>

    <div>
      {{ $post->comments_count }} comments
    </div>

    <div>
      <change-category 
      :categories="{{ App\Models\Category::all() }}" 
      :category_id="{{ $post->category_id }}"
      :current_category="{{ App\Models\Category::find($post->category_id) }}"
      post_slug="{{ $post->slug }}"
      ></change-category>


    </div>

    <div class="flex justify-around items-center">
      <make-latest post_slug="{{ $post->slug }}"></make-latest>
      <svg id="delete" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
      <a href="{{ route('post.edit', $post->slug) }}">
        <svg id="delete" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </a>
    </div>

  </div>
  @empty
  @endforelse
</div>

{{ $posts->links() }}

@endsection