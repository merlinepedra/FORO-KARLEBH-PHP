@extends('layouts.admin')

@section('content')

<div class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 p-4 rounded-md shadow">
  <div>Comment</div>
  <div>Owner</div>
  <div>Post</div>
  <div>Actions</div>
</div>

@forelse($comments as $comment)

<div class="grid md:grid-cols-4 gap-y-5 lg:gap-y-0 mb-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 p-4 rounded-md shadow hover:shadow-2xl hover:mb-4 transition-all duration-300">
  <div>
    <p>
      {{ Str::limit($comment->comment, 10) }}
    </p>
  </div>

  <div>
    {{ $comment->user->name }}
  </div>

  <div>
    <a href="{{ route('post.show', $comment->post->slug) }}">
      {{ Str::limit($comment->post->title, 50) }}
    </a>
  </div>

  <div>
    <button onclick="alert('Only Super Admin can perform this action')">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
    </button>
  </div>

  <div>
  </div>
</div>

@empty
@endforelse

{{ $comments->links() }}

@endsection