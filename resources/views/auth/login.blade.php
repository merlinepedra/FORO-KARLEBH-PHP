<x-guest-layout>

  <section class="md:grid grid-cols-2 h-[89vh]">
    <div class="bg-blue-100 hidden md:block">

      Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Id tempora beatae, ducimus exercitationem fugit ratione. In unde commodi voluptatem, non autem praesentium a nobis rem odit perferendis vitae cum natus.

    </div>

    <div class="w-10/12 grid items-center mx-auto mt-40 md:mt-0">

      <div class="">
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
          </div>
          <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" />
          </div>
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
              <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>

          <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-3" href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
              {{ __('Register') }}
            </a>
            @endif

            <x-button class="ml-3">
              {{ __('Log in') }}
            </x-button>
          </div>
        </form>

      </div>

    </div>
  </section>
</x-guest-layout>
