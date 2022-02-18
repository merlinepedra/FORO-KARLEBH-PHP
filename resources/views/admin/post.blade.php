@extends('layouts.admin')

@section('content')
<div>

  @forelse($posts as $post)
  <div class="grid grid-cols-2 lg:grid-cols-5 items-center mb-10">
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

    <make-latest post_slug="{{ $post->slug }}"></make-latest>
  </div>
  @empty
  @endforelse
</div>

{{ $posts->links() }}

@endsection