@extends('layouts.admin')

@section('content')

<div class="grid gap-y-4">
@forelse($profiles as $profile)

  <div class="grid md:grid-cols-4 bg-gray-50 h-40 justify-between items-center px-3 rounded-md shadow-lg">
    <div>
      @if($profile->file)
      <img class="w-28 h-32 rounded-lg" src="/storage/uploads/{{ $profile->file->file }}" alt="">
      @else 
      <img class="w-28 h-32 rounded-lg" src="/image-header.jpg" >
      @endif
    </div>

    <div class=" text-blue-800 font-bold text-xl">
      <a href="{{ route('profile.show', $profile->name) }}">{{ $profile->name }}</a>
    </div>

    <div>
      {{ $profile->user->posts->count() }} posts
    </div>

    <div class="flex  justify-around">
      <toggle-admin 
      :is_admin="{{ $profile->user->is_admin ? 'true' : 'false' }}"
      :user_id="{{ $profile->user_id }}"
       class="flex-shrink-0 flex-grow-0"
      ></toggle-admin>
      <block-user class="flex-shrink-0 flex-grow-0"></block-user>
    </div>
  </div>
  

@empty

@endforelse
</div>

@endsection