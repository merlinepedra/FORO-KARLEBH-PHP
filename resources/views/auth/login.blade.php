<x-guest-layout>

  <section class="md:grid grid-cols-2 h-screen dark:bg-gray-400">
    <div class="bg-blue-100 dark:bg-gray-500 hidden md:flex items-center justify-center p-10">
      <div class="text-3xl font-bold font-mono ">
        <div>
          Welcome back <span class="text-blue-700 dark:text-gray-700">User!</span>
        </div>
        <div class="mt-5 text-gray-500 dark:text-gray-300">
         kindly enter your data.
       </div>

       <div class="mt-3 text-blue-600 dark:text-gray-700">
        Fun and answers awaits!

      </div>
    </div>
  </div>

  <div class="w-10/12 grid items-center mx-auto pt-20">

    <div class="">

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
          <x-label for="email" :value="__('Email')" />

          <x-input id="email" autocomplete="off" class="block mt-1 w-full placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <div class="mt-4">
          <x-label for="password" :value="__('Password')" />

          <x-input id="password" autocomplete="off" 
          class="block mt-1 w-full placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300"
          type="password"
          name="password"
          required autocomplete="current-password" />
        </div>
        <div class="block mt-4">
          <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" 
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-300" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
          </label>
        </div>

        <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-3" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
          @endif

          <x-button class="ml-4">
            {{ __('Login') }}
          </x-button>
        </div>
      </form>

    </div>

  </div>
</section>
</x-guest-layout>
