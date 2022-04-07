@extends('layouts.app')

@section('title',  str_replace('-', ' ', $profile->name))

@section('section')
<div class="mx-auto w-full bg-gray-100 rounded-md p-4">

  <div class="bg-blue-100 p-4 rounded-md">

    <div class="flex flex-col sm:flex-row justify-evenly gap-y-5 sm:gap-y-0 gap-x-5 md:gap-x-1">
      <div class="w-5/12">
        <img class="h-28 md:h-40 rounded-md" @if($profile->file) src="/storage/uploads/{{ $profile->file->file }}" @else src="/image-header.jpg" @endif>
      </div>

      <div class="w-7/12 md:w-5/12 flex flex-col justify-between">
        <div>
          <p class="capitalize text-xl">{{ str_replace('-', ' ', $profile->name) }}</p>
          <p class="text-gray-600 -mt-2">user</p>
        </div>

        <div class="flex rounded-md mt-4">
          <div class="bg-blue-200 px-3 py-1 rounded-l-md">
            <div class="text-xs text-gray-500">Posts</div>
            <div class="text-lg">{{ $profile->user->posts->count() }}</div>
          </div>

          <div class="bg-blue-200 px-3 py-1">
            <div class="text-xs text-gray-500">Followers</div>
            <div class="text-lg">{{ $profile->followers->count() }}</div>
          </div>

          <div class="bg-blue-200 px-3 py-1 rounded-r-md">
           <div class="text-xs text-gray-500">Comments</div>
           <div class="text-lg">{{ $profile->user->comments->count() }}</div>
         </div>
       </div>
     </div>
   </div>
   
   @if(auth()->id() !== $profile->id)
   <div class="flex justify-center my-6">
     <Follow 
     :user_id="{{ $profile->user->id }}"
     :follows="{{ auth()->user() ? (int) auth()->user()->following->contains($profile->user->id) : 0 }}"
     ></Follow>
   </div>
   @endif

   <div class="mt-5 bg-gray-100 p-5 rounded-md">


    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
      <span class="text-sm text-gray-500">Email</span>
      <span class="text-gray-800">{{ $profile->user->email }}</span>
    </div>

    @if($profile->phone)
    <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
      <span class="text-sm text-gray-500">Email</span>
      <span class="text-gray-800">{{ $profile->user->email }}</span>
    </div>
  </div>
  @endif

  @if($profile->phone)
  <div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
    <span class="text-sm text-gray-500">Email</span>
    <span class="text-gray-800">{{ $profile->phone }}</span>
  </div>
</div>
@endif

@if($profile->country)
<div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
  <span class="text-sm text-gray-500">Email</span>
  <span class="text-gray-800">{{ $profile->country }}</span>
</div>
</div>
@endif

@if($profile->sxe)
<div class="flex flex-col border-b border-dashed border-blue-200 pb-4">
  <span class="text-sm text-gray-500">Email</span>
  <span class="text-gray-800">{{ ucfirst($profile->sex) }}</span>
</div>
</div>
@endif

</div>
</div>


<div class="bg-blue-100 p-4 rounded-md">
  @include('components.posts', ['posts' => App\Models\Post::whereUserId($profile->user_id)->latest()->take(5)->get()])
</div>



</div>
@endsection
