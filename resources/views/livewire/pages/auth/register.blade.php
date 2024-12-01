<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                placeholder='Name' autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                placeholder='Email' required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder='Password' required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                placeholder="Confirm Password" type="password" name="password_confirmation" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col mt-4">
            <button type="submit"
                class="max-w-full transition-shadow duration-300 ease-in-out bg-gradient-to-r from-gray-800 to-gray-600 text-white rounded-lg p-2 font-semibold uppercase shadow-md hover:shadow-lg hover:from-gray-600 hover:to-gray-800 active:translate-y-0.5 active:shadow-sm">
                {{ __('Register') }}
            </button>
            <a class="underline
            mx-auto mt-2
                text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already have account') }}
            </a>
        </div>
    </form>
</div>
