<x-guest-layout>

  <section class="md:grid grid-cols-2 h-screen dark:bg-gray-400">
   <div class="bg-blue-100 dark:bg-gray-500 hidden md:flex items-center justify-center p-10 order-2">
    <div class="text-3xl font-bold font-mono ">
      <div>
        Welcome <span class="text-blue-700 dark:text-gray-700">Guest!</span>
      </div>
      <div class="mt-5 text-gray-500 dark:text-gray-300">
       Registration takes less than a minute. It's that fast!
     </div>

     <div class="mt-3 text-blue-600 dark:text-gray-700">
      Fun and answers awaits!

    </div>
  </div>
</div>

<div class="w-10/12 grid items-center mx-auto pt-20 md:mt-0 order-1">

  <div class="">

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" autocomplete="off" class="block mt-1 w-full placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" autocomplete="off" class="block mt-1 w-full placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-300" autocomplete="off"
        type="password"
        name="password"
        required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full dark:placeholder-gray-300 dark:bg-gray-300" autocomplete="off"
        type="password"
        name="password_confirmation" required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4">
          {{ __('Register') }}
        </x-button>
      </div>
    </form>


  </div>

</div>
</section>
</x-guest-layout>


