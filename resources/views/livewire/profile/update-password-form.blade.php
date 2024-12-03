<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section>
    <header class="mb-4">
        <h2 class="lg:text-xl md:text-md sm:text-sm text-center 
         text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

    </header>

    <form wire:submit="updatePassword">
        <div class="mb-4">
            <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password"
                type="password" class="mt-1 block w-full" placeholder="Current Password" autocomplete="current-password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-text-input wire:model="password" id="update_password_password" name="password" type="password"
                class="mt-1 block w-full" placeholder="New Password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation"
                placeholder="Confirm Password" name="password_confirmation" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="default-button text-[10px] rounded">{{ __('Change Password') }}</button>

            <x-action-message class="me-3" on="password-updated">
                {{ __('Password Changed.') }}
            </x-action-message>
        </div>
    </form>
</section>
