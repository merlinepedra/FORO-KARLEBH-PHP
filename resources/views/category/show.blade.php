@extends('layouts.app')

@section('section')
<div class="max-w-3xl mt-5 mx-auto bg-gray-100 p-6">

  <div class="mx-auto max-w-3xl bg-gray-100 p-6">
  <h1 class="text-2xl font-base text-center">{{ ucfirst($category->name) }}</h1>

  @forelse($category->posts as $post)
  <a href="{{ route('post.show', $post) }}">
    <div class="my-10 border-b border-gray-500">
    <div class="flex justify-between">
      <div>
        <h1 class="text-3xl font-semibold truncate">{{ $post->title }}</h1>
        <p class="font-base opacity-75 truncate">{{ $post->desc }}</p>
      </div>
      <div>
        <p class="italic"> comment(s) {{ $post->comments->count() }}</p>
      </div>
    </div>

    <div class="w-full py-4">
      <p>by <small class="text-lime-500">{{ $post->user->name }}</small>  {{ $post->created_at->diffForHumans() }}</p>
      <p class="ml-3"> {{ $post->category }}</p>
    </div>
  </div>
</a>
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
