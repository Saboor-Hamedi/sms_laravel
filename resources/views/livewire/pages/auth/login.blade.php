<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    @section('title', 'Login')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Title -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Login</h2>
        <p class="text-sm text-gray-500">Enter your credentials to access your account</p>
    </div>

    <form wire:submit.prevent="login">
        <!-- Email Address -->
        <div>
            <x-text-input wire:model="form.email" id="email" class="block w-full mt-1" type="email" name="email"
                placeholder='Email' />
            @error('form.email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input wire:model="form.password" id="password" class="block w-full mt-1" type="password"
                placeholder='Password' name="password" />
            @error('form.password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror

        </div>

        <!-- Remember Me -->
        <div class="flex justify-between mt-3 mb-3">
            <div>
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="text-indigo-600 border-gray-300 shadow-sm cursor-pointerrounded dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span
                        class="ml-1 text-sm text-gray-600 cursor-pointer hover:text-gray-900 ">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a class="mt-1 text-sm text-gray-600 underline hover:text-gray-900 "
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
            </div>
            @endif
        </div>

        <button type="submit"
            class="w-full px-4 py-2 font-semibold text-white bg-gray-900 rounded-md shadow-sm focus:outline-none ">
            Login
        </button>
        <livewire:login.login />

        <!-- Register Redirect -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register here</a>
            </p>
        </div>
    </form>
</div>
