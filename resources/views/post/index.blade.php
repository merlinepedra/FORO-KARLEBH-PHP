@extends('layouts.app')

@section('section')

<div class="mx-auto max-w-3xl bg-gray-100 p-6">
  <h1 class="text-2xl font-base text-center">All Posts</h1>

  @forelse($posts as $post)
  <a href="{{ route('post.show', $post) }}">
    <div class="my-10 border-b border-gray-500">
    <div class="flex justify-between">
      <div>
        <h1 class="text-3xl font-semibold truncate">{{ $post->title }}</h1>
        <p class="font-base opacity-75 truncate">{{ $post->desc }}</p>
      </div>
      <div>
        <p class="italic"> comment(s) {{ $post->comments_count }}</p>
      </div>
    </div>

    <div class="w-full py-4">
      <p>by <small class="text-lime-500">{{ $post->user->name }}</small>  {{ $post->created_at->diffForHumans() }}</p>
      <p class="ml-3"> {{ $post->category }}</p>
    </div>
  </div>
</a>
@empty

<h1>No Posts Yet</h1>

@endforelse

</div>


@endsection