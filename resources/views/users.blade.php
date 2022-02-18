@extends('layouts.app')

@section('section')

<div class="mx-auto max-w-3xl bg-gray-100 p-6 mt-6">

  @foreach($users as $user)
  <div class="mt-4 flex">
    <span>
      <a class="mr-20 text-blue-500 font-semibold" href="{{ route('profile.show', $user->name) }}">{{ $user->name }}</a>
    </span>

    <span class="mr-20">Joined <span class="font-semibold">{{ $user->created_at->diffForHumans() }}</span></span>

    <Follow 
    :user_id="{{ $user->id }}"
    :follows="{{ auth()->user() ? (int) auth()->user()->following->contains($user->id) : 0 }}"
    ></Follow>

  </div>
  @endforeach

  {{ $users->links() }}
</div>

@endsection