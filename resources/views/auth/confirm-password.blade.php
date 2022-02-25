<x-guest-layout>

<section class="md:grid grid-cols-2 h-screen">
  <div class="bg-blue-100 hidden md:block">
    <div class="mb-4 text-sm text-gray-600">
      {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>
  </div>

  <div class="w-10/12 grid items-center mx-auto mt-40 md:mt-0">

    <div class="">


  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div>
      <x-label for="password" :value="__('Password')" />

      <x-input id="password" class="block mt-1 w-full"
      type="password"
      name="password"
      required autocomplete="current-password" />
    </div>

    <div class="flex justify-end mt-4">
      <x-button>
        {{ __('Confirm') }}
      </x-button>
    </div>
  </form>

    </div>

  </div>
</section>
</x-guest-layout>