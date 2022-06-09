<x-guest-layout>

    <section class="md:grid grid-cols-2 dark:bg-gray-400">
        <div class="hidden md:flex items-center justify-center p-10 ml-auto">
            <div class="text-3xl font-bold font-mono ">
                <div class="mt-3 text-blue-600 dark:text-gray-700">
                    Enter your email!
                </div>

                <div class="mt-5 text-xl text-gray-500 dark:text-gray-300">
                    This is the email you entered during registeration
                </div>
            </div>
        </div>

        <div class="md:bg-blue-100 dark:bg-gray-500 flex items-center justify-center p-10">
            <div class="w-10/12 grid items-center pt-20 md:pt-0 order-1 mr-auto">

                <div class="">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block font-medium dark:text-gray-200">Email</label>

                            <x-input id="email" class="block mt-1 w-full dark:bg-gray-300" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-guest-layout>