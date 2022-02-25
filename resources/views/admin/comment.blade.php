@extends('layouts.admin')

@section('content')

<div class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-sm shadow">
  <div>Comment</div>
  <div>Owner</div>
  <div>Post</div>
  <div>Actions</div>
</div>
  @forelse($comments as $comment)

  <div 
  class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 p-4 rounded-sm shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
  <div>
    <p>
      {{ Str::limit($comment->comment, 10) }}
    </p>
  </div>

  <div>
    {{ $comment->user->name }}
  </div>

  <div>
    {{ $comment->post->title }} 
  </div>

  <div>
    <div>Delete</div>
  </div>

  <div>
  </div>
</div>

@empty
@endforelse

{{ $comments->links() }}

@endsection