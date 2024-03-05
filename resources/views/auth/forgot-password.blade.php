    @include('layouts.public-layout')
    <div class="h-screen w-full bg-gray-100 inline-flex justify-center items-center">

        <div class="max-w-md bg-white p-4">
            <div class="text-center">
                <x-application-logo class="text-teal-600"/>
            </div>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-text-input id="email" class="block mt-1 w-full placeholder:text-gray-500" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

