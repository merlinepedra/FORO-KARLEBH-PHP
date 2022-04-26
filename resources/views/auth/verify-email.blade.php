<x-guest-layout>

  <section class="md:grid grid-cols-2 h-screen dark:bg-gray-400">

    <div class="bg-blue-100 dark:bg-gray-500 hidden  md:flex items-center justify-center p-10 order-2">
     <div class="mb-4 text-sm text-gray-600">
      {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-gray-300">
      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif
  </div>

  <div class="w-10/12 grid items-center mx-auto pt-20 order-1">
    <div class="">

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
          <x-button>
            {{ __('Resend Verification Email') }}
          </x-button>
        </div>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
          {{ __('Log Out') }}
        </button>
      </form>

    </div>

  </div>
</section>
</x-guest-layout>