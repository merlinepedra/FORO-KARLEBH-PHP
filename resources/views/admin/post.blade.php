@extends('layouts.admin')

@section('content')
<div>

  <div class="mb-10 md:flex md:justify-between md:items-center">

    <div class="md:flex">
      <div>
        <h1 class="text-2xl">Posts ({{ $posts->count() }})</h1>
      </div>
      <div class="flex items-center bg-gray-50 rounded-l-sm pl-3 py-2 mt-3 md:mt-0 md:ml-7">
       <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-current"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
       <input placeholder="Search for topics" class="w-full bg-gray-50 rounded-r-sm focus:outline-none px-3">
     </div>
   </div>

   <a href="{{ route('post.create') }}">
    <div class="pt-1 pb-2 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md w-48">
      <span class="text-lg">+</span>
      <span class="ml-2">Start a New Topic</span>
    </div>
  </a>
</div>

<div style="height: .05rem;" class="bg-gray-400 mb-10"></div>

<div class="flex flex-col md:flex-row justify-between gap-y-5 lg:gap-y-0 md:items-center mb-3 bg-gray-100 p-4 rounded-sm shadow">
  <div>Title</div>
  <div>Views</div>
  <div>Comments</div>
  <div>Category</div>
  <div>Actions</div>
</div>

@forelse($posts as $post)
<div class="flex flex-col md:flex-row justify-between gap-y-5 lg:gap-y-0 md:items-center mb-3 bg-gray-100 p-4 rounded-sm shadow hover:shadow-2xl hover:mb-4 transition-all duration-300 ">
  <div>
    <change-title :post="{{ $post }}"></change-title>
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
    post_slug="{{ $post->slug }}"
    ></change-category>


  </div>

  <div>
    <make-latest post_slug="{{ $post->slug }}"></make-latest>
    <div>Delete</div>
  </div>

</div>
@empty
@endforelse
</div>

{{ $posts->links() }}

@endsection