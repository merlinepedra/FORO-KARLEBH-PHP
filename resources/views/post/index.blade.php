 @extends('layouts.app')

@section('title', 'all posts')

@section('section')

<div class="mx-auto w-full">

  @forelse($posts as $post)
  <div class="my-4 py-4 px-2 bg-gray-50 dark:bg-gray-400 dark:text-gray-700 shadow-md rounded-md">
    <div class="flex">
     <div class="w-11/12">
      <a href="{{ route('post.show', $post) }}">
        <h1 class="lg:text-xl font-semibold truncate">{{ $post->title }}</h1>
        <p class="text-gray-600 font-base mt-3">{{ $post->desc }}</p>
      </a>
    </div>
  </div>

  <hr class="my-2 bg-gray-400 dark:bg-gray-700">

  <div class="w-full py-1 flex justify-between items-center">
    <div class="flex justify-center">
      <div class="mr-3">
        <img 
        @if(!$post->user->profile->file) src="/image-header.jpg" @else src="/storage/uploads/{{ $post->user->profile->file->file }}" @endif 
        class="w-6 h-6 object-center object-cover rounded-full" alt="image">
      </div>

      <div class="flex text-sm mr-4">
        <div class="mr-2"><span class="hidden md:inline mr-2">posted</span>by</div>

        <a href="{{ route('profile.show', $post->user->profile) }}" class="text-blue-900 font-semibold mr-2" >{{ $post->user->name }}</a>
        <span class="mr-2">in</span>
        <a href="{{ route('category.show', $post->category) }}" class="text-blue-900 font-semibold mr-2" >
          {{ $post->category }}</a>
        </div>

        <span class="text-sm">{{ $post->created_at->shortRelativeDiffForHumans() }}</span>
      </div>

      <div class="flex items-center">
    {{--     <Like
        :likeable_id="{{ $post->id }}"
        likeable_type="{{ $post::class }}"
        :user_id="{{ $post->user_id }}"
        class="hidden md:flex mr-4 mt-2"
        ></Like> --}}
        <svg class="w-6 h-6 mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <span class="text-blue-900 font-bold">{{ $post->comments_count > 0 ? $post->comments_count : '' }}</span>
      </div>
    </div>
  </div>
  @empty

  <h1 class="text-center dark:text-gray-400">No Posts Yet <a href="{{ route('post.create') }}" class="ml-4 text-blue-900 dark:text-gray-400 font-semibold">Create a Topic</a></h1>

  @endforelse

  {{ $posts->links() }}

</div>


@endsection