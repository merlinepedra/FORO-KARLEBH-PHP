@extends('layouts.admin')

@section('content')

<div class="grid gap-y-4">
@forelse($profiles as $profile)

  <div class="grid grid-cols-5 bg-gray-900 h-40 justify-between items-center px-3 rounded-md shadow">
    <div>
      @if($profile->file)
      <img class="w-28 h-32 rounded-lg" src="/storage/uploads/{{ $profile->file->file }}" alt="">
      @else 
      <img class="w-28 h-32 rounded-lg" src="/image-header.jpg" >
      @endif
    </div>

    <div class="col-span-3">
      {{ $profile->name }}
    </div>

    <div class="justify-self-end">
      <toggle-admin 
      :is_admin="{{ $profile->user->is_admin ? 'true' : 'false' }}"
      :user_id="{{ $profile->user_id }}"></toggle-admin>
    </div>
  </div>
  

@empty

@endforelse
</div>

@endsection