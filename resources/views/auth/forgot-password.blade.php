<x-guest-layout>

  <section class="md:grid grid-cols-2 h-screen">
    <div class="bg-blue-100 hidden md:block order-2">

      Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Id tempora beatae, ducimus exercitationem fugit ratione. In unde commodi voluptatem, non autem praesentium a nobis rem odit perferendis vitae cum natus.

    </div>

    <div class="w-10/12 grid items-center mx-auto mt-40 md:mt-0 order-1">

      <div class="">

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <!-- Email Address -->
          <div>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-button>
              {{ __('Email Password Reset Link') }}
            </x-button>
          </div>
        </form>
      </div>

    </div>
  </section>
</x-guest-layout>



