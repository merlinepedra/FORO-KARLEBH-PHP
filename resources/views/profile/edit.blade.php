@extends('layouts.app')
@section('title', 'edit profile')

@section('section')

<div class="mx-auto w-full bg-gray-100 md:rounded-md p-6 mt-5 dark:bg-gray-700 dark:text-gray-400">
  <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data" class="py-3" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <h1 class="text-2xl font-semibold text-center text-gray-900 dark:text-gray-300">Edit Profile</h1>

    <div class="mt-10 md:w-9/12 mx-auto">
      <small class="text-blue-500 font-semibold dark:text-gray-200">All fields are optional.</small>
    </div>

    <div class="mt-7 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">City</label>
      <input type="text" 
      autocomplete="off"
      name="city" placeholder="Enter the name of your city" 
      class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->city) bg-gray-300 @endif" 
      @if($profile->city) value="{{ $profile->city }}" @else value="{{ old('city') }}" @endif>
      @error('city')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
      @enderror
    </div>

    <div class="mt-10 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">Country</label>
      <input type="text" autocomplete="off"
      name="country" placeholder="What country are you from?" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->country) bg-gray-300 @endif" 
      @if($profile->country) value="{{ $profile->country }}" @else value="{{ old('country') }}" @endif>
      @error('country')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
      @enderror
    </div>

    <div class="mt-10 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">Phone</label>
      <input type="text" autocomplete="off"
      name="phone" placeholder="We do not mind if you share your phone number" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->phone) bg-gray-300 @endif" 
      @if($profile->phone) value="{{ $profile->phone }}" @else value="{{ old('phone') }}" @endif>
      <small class="text-blue-500 font-semibold my-2 dark:text-gray-200">Your number is visible to you only</small>
      @error('phone')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
      @enderror
    </div>

    <div class="md:w-9/12 mx-auto mt-10">
      <label for="sex" class="dark:text-gray-200">Gender</label>
      <select name="sex" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 w-full rounded-md focus:ring-0 focus:border-purple-500 mt-2 @if($profile->sex) bg-gray-300 @endif">
        <option @if($profile->sex == 'male') selected @endif value="male">Male</option>
        <option @if($profile->sex == 'female') selected @endif value="female">Female</option>
        <option @if($profile->sex == 'others') selected @endif value="others">Others</option>
      </select>
      @error('sex')
      <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
      @enderror
    </div>

    {{-- Filepond --}}
    <div class="md:w-9/12 mx-auto mt-10">
      <small class="text-blue-500 font-semibold dark:text-gray-200">This image will be used as your profile photo.
        @if(! $profile->file) It will remove the deafult image. @endif
      </small>
      <input 
      type="file" 
      id="photo" 
      name="images[]"
      accept="image/*" 
      data-max-file-size="5MB"
      class="w-full mt-2"
      >
    </div>

    <div class="mt-8 md:w-9/12 mx-auto">
      <input type="submit" value="Update Profile" class="px-3 py-2 bg-green-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
    </div>

  </form>

</div>
@endsection
