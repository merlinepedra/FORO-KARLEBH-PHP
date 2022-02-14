@extends('layouts.app')

@section('section')
<div class="max-w-3xl mt-5 mx-auto bg-gray-100 p-6">

  <form action="{{ route('profile.update', $profile) }}" method="POST" 
  enctype="multipart/form-data"
  class="py-3" enctype="multipart/form-data">
  @method('PATCH')
  @csrf

  <h1 class="text-2xl font-semibold text-center">Edit Profile</h1>

  <div class="mt-10 w-9/12 mx-auto">
   <small class="text-blue-500 font-semibold">All fields are optional.</small>
 </div>

 <div class="mt-7 w-9/12 mx-auto">
  <label for="city">City</label>
  <input type="text" 
  name="city" placeholder="Enter the name of your city" class="mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->city) bg-gray-300 @endif" 
  @if($profile->city) value="{{ $profile->city }}" @else value="{{ old('city') }}" @endif>
  @error('city')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

<div class="mt-10 w-9/12 mx-auto">
  <label for="city">Country</label>
  <input type="text" 
  name="country" placeholder="What country are you from?" class="mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->country) bg-gray-300 @endif" 
  @if($profile->country) value="{{ $profile->country }}" @else value="{{ old('country') }}" @endif>
  @error('country')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

<div class="mt-10 w-9/12 mx-auto">
  <label for="city">Phone</label>
  <input type="text" 
  name="phone" placeholder="We do not mind if you share your phone number" class="mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 @if($profile->phone) bg-gray-300 @endif" 
  @if($profile->phone) value="{{ $profile->phone }}" @else value="{{ old('phone') }}" @endif>
  <small class="text-blue-500 font-semibold my-2">Your number is visible to you only</small>
  @error('phone')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

<div class="w-9/12 mx-auto mt-10">
  <label for="sex">Gender</label>
  <select name="sex" class="w-full rounded-md focus:ring-0 focus:border-purple-500 mt-2 @if($profile->sex) bg-gray-300 @endif">
    <option @if($profile->sex == 'male') selected @endif value="male">Male</option>
    <option @if($profile->sex == 'female') selected @endif value="female">Female</option>
    <option @if($profile->sex == 'others') selected @endif value="others">Others</option>
  </select>
  @error('sex')
  <div class="text-sm text-red-500 justify-end">{{ $message }}</div>
  @enderror
</div>

{{-- Filepond --}}
<div class="w-9/12 mx-auto mt-10">
  <small class="text-blue-500 font-semibold">This image will be used as your profile photo.
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

<div class="mt-8 w-9/12 mx-auto">
  <input type="submit" value="Update Profile" class="px-3 py-3 bg-green-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
</div>

</form>

</div>
<br>
<br>
<br>
@endsection
