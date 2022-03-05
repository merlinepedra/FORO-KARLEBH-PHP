@extends('layouts.app')

@section('title', 'Notifications')

@section('section')


<div class="mx-auto w-full bg-gray-100 p-6 mt-6 rounded-md">
  <div>
    @forelse($notifications as $notification)

    {{-- Like Notification --}}
    @if($notification->type === 'App\Notifications\LikeNotification') 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4 text-gray-700">

      {{ $notification->data['liker']['name'] }} liked 

      {{ $notification->created_at->diffForHumans() }}
    </div>
    @endif

    {{-- Follow Notification --}}
    @if($notification->type === 'App\Notifications\FollowNotifiation') 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4">
      {{ $notification->data['follower'] }}
    </div>
    @endif

    {{-- CommentCreated --}}
    @if($notification->type === 'App\Notifications\CommentCreated') 
    <div class="bg-blue-200 min-h-40 h-40 rounded-md shadow mb-3 p-4">
      {{ $notification->data['sender'] }}
      {{ $notification->data['message'] }}
    </div>
    @endif

    @empty 

    <h3 class="text-center">No new notifications yet.</h3>

    @endforelse

  </div>

</div>

@endsection