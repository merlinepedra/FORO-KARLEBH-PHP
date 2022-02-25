@extends('layouts.app')

@section('section')

<div class="mx-auto w-full bg-gray-50 rounded-md py-10 px-6">

<div class="">
  <div>
    

  @foreach($users as $user)
  <div class="mt-4 grid grid-cols-3 place-content-evenly">

    <span class="">
      <a class="text-blue-500 font-semibold" href="{{ route('profile.show', $user->name) }}">{{ $user->name }}</a>
    </span>

    <span class="">Joined <span class="font-semibold">{{ $user->created_at->diffForHumans() }}</span></span>

    <Follow 
    :user_id="{{ $user->id }}"
    :follows="{{ auth()->user() ? (int) auth()->user()->following->contains($user->id) : 0 }}"
    ></Follow>

  </div>
  @endforeach

  {{ $users->links() }}
    </div>
</div>

</div>

@endsection