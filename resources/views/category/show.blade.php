@extends('layouts.app')
@section('title', $category->name)

@section('section')
<div class="mx-auto w-full">

  <div class="my-4 p-4 bg-gray-50 shadow-md rounded-md dark:bg-gray-400">

    <h1 class="text-2xl font-base text-center">{{ ucfirst($category->name) }}</h1>

    @forelse($posts as $post)
    <div class="my-10 border-b border-gray-500 rounded-md">
      <div class="flex justify-between">
        <div>
          <a href="{{ route('post.show', $post) }}">
            <h1 class="text-lg md:text-xl font-semibold truncate text-gray-700">{{ $post->title }}</h1>
          </a>
          <p class="font-base opacity-75 truncate">{{ $post->desc }}</p>
        </div>
        <div>
          <p class="italic"> comment(s) <span class="text-blue-900 font-bold">{{ $post->comments->count() }}</span></p>
        </div>
      </div>

      <div class="w-full py-4">
        <p>by <a href="{{ route('profile.show', $post->user->name) }}" class="text-lime-500 dark:text-gray-200 text-sm">{{ $post->user->name }}</a>  {{ $post->created_at->diffForHumans() }}</p>
      </div>

    </div>
    @empty

    <h1>No Posts Yet.    <a href="{{ route('post.create') }}" class="ml-4 text-blue-500">Create post?</a></h1>

    @endforelse

    {{ $posts->links() }}
  </div> 

  </div>
  @endsection
