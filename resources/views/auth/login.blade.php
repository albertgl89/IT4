<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{url('/dashboard')}}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Correu electrònic')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contrassenya')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center std-form-label">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-900 shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-black">{{ __('Recorda\'m') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="std-link" href="{{ route('password.request') }}">
                        {{ __('Has oblidat la contrassenya?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Entra') }}
                </x-button>
            </div>
            <a class="std-link" href="{{ url('register') }}">
                {{ __('Registra\'t') }}
            </a>
        </form>
    </x-auth-card>
</x-guest-layout>
