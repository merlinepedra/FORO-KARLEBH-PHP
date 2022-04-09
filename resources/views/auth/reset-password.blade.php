

<x-guest-layout>
  <section class="md:grid grid-cols-2 h-screen dark:bg-gray-400">
    <div class="bg-blue-100 dark:bg-gray-500 hidden md:flex items-center justify-center p-10">
    <div class="text-3xl font-bold font-mono ">
      <div>
        Welcome <span class="text-blue-700 dark:text-gray-700">User!</span>
      </div>
      <div class="mt-5 text-gray-500 dark:text-gray-300">
       Password reset takes less than a minute. It's that fast!
     </div>

     <div class="mt-3 text-blue-600 dark:text-gray-700">
      Fun and answers awaits!

    </div>
  </div>
</div>

<div class="w-10/12 grid items-center mx-auto mt-40 md:mt-0">

  <div class="">

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-label for="password" :value="__('Password')" />

          <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-label for="password_confirmation" :value="__('Confirm Password')" />

          <x-input id="password_confirmation" class="block mt-1 w-full"
          type="password"
          name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
          <x-button>
            {{ __('Reset Password') }}
          </x-button>
        </div>
      </form>

    </div>

  </div>
</section>
</x-guest-layout>


