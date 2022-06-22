@extends('layouts.app')

@section('title', str_replace('-', ' ', $profile->name) . '\'s profile')

@section('section')
<div class="mx-auto w-full bg-gray-100 rounded-md p-6 mt-5 text-gray-800 dark:bg-gray-700 dark:text-gray-200">

  <div class="grid place-items-center sm:grid-cols-2">
    <div>
      <img class="h-28 md:h-40 rounded-md" @if($latestPic) src="/uploads/{{ $latestPic }}" @else src="/image-header.jpg" @endif>
    </div>

    <div class="flex flex-col">
      <div class="hidden md:block">
        <p class="capitalize text-xl">{{ str_replace('-', ' ', $profile->name) }}</p>
        <p class="text-gray-600 dark:text-gray-300  -mt-2">user</p>
      </div>

      <div class="flex rounded-md mt-4">
        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1 rounded-l-md">
          <div class="text-xs text-gray-500 dark:text-gray-800">Posts</div>
          <div class="text-lg dark:text-gray-200">{{ $profile->user->posts->count() }}</div>
        </div>

        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1">
          <div class="text-xs text-gray-500 dark:text-gray-800">Followers</div>
          <div class="text-lg dark:text-gray-200">{{ $profile->followers->count() }}</div>
        </div>

        <div class="w-20 h-18 bg-blue-200 dark:bg-gray-400 px-3 py-1 rounded-r-md">
          <div class="text-xs text-gray-500 dark:text-gray-800">Comments</div>
          <div class="text-lg dark:text-gray-200">{{ $profile->user->comments->count() }}</div>
        </div>
      </div>
    </div>
  </div>


  {{-- --}}

  @if(auth()->id() !== $profile->id)
  <div class="flex justify-center my-6">
    <Follow :user_id="{{ $profile->user->id }}" :follows="{{ auth()->user() ? (int) auth()->user()->following->contains($profile->user->id) : 0 }}"></Follow>
  </div>
  @endif
  {{-- --}}



  <div class="mt-5 dark:bg-gray-500 p-5 rounded-md">

    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500 dark:text-gray-300">Email</span>
      <span class="text-gray-800 dark:text-gray-200">{{ $profile->user->email }}</span>
    </div>

    @if($profile->city)
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500 dark:text-gray-300">City</span>
      <span class="text-gray-800 dark:text-gray-200">{{ $profile->user->city }}</span>
    </div>
    @endif

    @if($profile->phone)
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500 dark:text-gray-300">Phone</span>
      <span class="text-gray-800 dark:text-gray-200">{{ $profile->phone }}</span>
    </div>
    @endif

    @if($profile->country)
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500 dark:text-gray-300">Country</span>
      <span class="text-gray-800 dark:text-gray-200">{{ $profile->country }}</span>
    </div>
    @endif

    @if($profile->sex)
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4 mt-3">
      <span class="text-sm text-gray-500 dark:text-gray-300">Gender</span>
      <span class="text-gray-800 dark:text-gray-200">{{ ucfirst($profile->sex) }}</span>
    </div>
    @endif

  </div>

  {{-- --}}


  <div class="dark:bg-gray-500 bg-blue-100 p-4 rounded-md mt-4">
    @include('components.posts', ['posts' => App\Models\Post::whereUserId($profile->user_id)->latest()->take(5)->get()])
  </div>



</div>

@endsection