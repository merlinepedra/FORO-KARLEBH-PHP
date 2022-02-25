@extends('layouts.app')

@section('section')
<div class="mx-auto w-full">

  <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">

    <h1 class="text-2xl font-base text-center">{{ ucfirst($category->name) }}</h1>

    @forelse($category->posts as $post)
    <div class="my-10 border-b border-gray-500">
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
        <p>by <a href="{{ route('profile.show', $post->user->name) }}" class="text-lime-500 text-sm">{{ $post->user->name }}</a>  {{ $post->created_at->diffForHumans() }}</p>
      </div>

    </div>
    @empty

    <h1>No Posts Yet.    <a href="{{ route('post.create') }}" class="ml-4 text-blue-500">Create post?</a></h1>

    @endforelse

  </div> 

  <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
    <div>
      <div class="w-auto h-40 bg-red-500"></div>
    </div>
    <div class="col-start-3">
      <div class="w-auto h-40 bg-blue-500"></div>
    </div>
    <div>
      <div class="w-auto h-40 bg-yellow-500"></div>
    </div>
    <div>
      <div class="w-auto h-40 bg-lime-500"></div>
    </div>
    {{-- <div class=""> --}}
      <div class="row-start-1 col-start-2 col-span-2">
        <div class="w-auto h-40 bg-purple-500"></div>
      </div>
    </div>


  </div>
  @endsection
