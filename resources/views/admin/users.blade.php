@extends('layouts.admin')

@section('content')

<div class="grid gap-y-4">
@forelse($profiles as $profile)

  <div 
  class="grid grid-cols-2 md:grid-cols-4 gap-y-8 py-10 md:py-5 bg-gray-50 dark:bg-gray-300 justify-between items-center px-3 rounded-md shadow-lg">
    <div>
      @if($profile->file)
      <img class="w-8 h-8 object-center object-cover rounded-full" src="/storage/uploads/{{ $profile->file->file }}" alt="">
      @else 
      <img class="w-8 h-8 object-center object-cover rounded-full" src="/image-header.jpg" >
      @endif
    </div>

    <div class=" text-blue-800 font-bold text-md">
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
    </div>
  </div>
@empty

@endforelse

{{ $profiles->links() }}
</div>

@endsection