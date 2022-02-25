@extends('layouts.app')
@section('section')

{{-- <div class="mx-auto w-full bg-gray-100 rounded-md"> --}}
<div class="grid justify-center items-center w-full bg-gray-100 rounded-md">

  <div class="p-6">

    <div class="grid grid-rows-2 mt-10">

      <div class="grid grid-cols-2">
        <div class="text-sm text-blue-900 font-semibold">Like Notification</div>
        <custom-checkbox 
        url="{{ route('like-setting', auth()->id()) }}"
        :toggle="{{ auth()->user()->setting->like_notifiable ? 1 : 0 }}"></custom-checkbox>
      </div>

      <div class="text-blue-600 text-sm mt-3 italic">Turn on or off this button to switch between getting like notifications for your posts and comments</div>
    </div>
    
    <div class="grid grid-rows-2 mt-10">

     <div class="grid grid-cols-2">
      <div class="text-sm text-blue-900 font-semibold">Comment Notification</div>
      <custom-checkbox 
      url="{{ route('comment-setting', auth()->id()) }}"
      :toggle="{{ auth()->user()->setting->comment_notifiable ? 1 : 0 }}"></custom-checkbox>
    </div>

    <div class="text-blue-600 text-sm mt-3 italic">Turn on or off this button to switch between getting notifications for the comments to your posts</div>
  </div>

  <div class="grid grid-rows-2 mt-10">
    <div class="grid grid-cols-2">
      <div class="text-sm text-blue-900 font-semibold">Follow Notification</div>
      <custom-checkbox 
      url="{{ route('follow-setting', auth()->id()) }}"
      :toggle="{{ auth()->user()->setting->follow_notifiable ? 1 : 0 }}"
      ></custom-checkbox>
    </div>

    <div class="text-blue-600 text-sm mt-3 italic">Turn on or off this button to switch between getting notifications for follows by other users</div>
  </div>
</div>

</div>

@endsection
