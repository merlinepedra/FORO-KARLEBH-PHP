@extends('layouts.app')
@section('title', 'all users')


@section('section')

<div class="mx-auto w-full place-items-center bg-gray-50 rounded-md py-10 px-6 dark:bg-gray-500">

  <div>
    @foreach($users as $user)
    <div class="mt-4 flex justify-between px-8">

      <span class="">
        <a class="text-blue-500 dark:text-blue-900 font-semibold" href="{{ route('profile.show', $user->name) }}">{{ $user->name }}</a>
      </span>

      <span class="dark:text-gray-300">Joined <span class="font-semibold">{{ $user->created_at->diffForHumans() }}</span></span>

      <Follow 
      :user_id="{{ $user->id }}"
      :follows="{{ auth()->user() ? (int) auth()->user()->following->contains($user->id) : 0 }}"
      ></Follow>

    </div>
    @endforeach

  </div>
  <br>
  {{ $users->links() }}

</div>

@endsection