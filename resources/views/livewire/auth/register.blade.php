<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => '',
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered(($user = User::create($validated))));

    Auth::login($user);

    $this->redirect(route('jobs.create', absolute: false), navigate: true);
};

?>

<div>
  <h2 class="text-center text-lg">
    @lang('Register')
  </h2>

  <hr class="my-4">

  <form wire:submit="register">
    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Name')" />

      <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text"
        name="name" required autofocus autocomplete="name" />

      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />

      <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email"
        name="email" required autocomplete="username" />

      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
        name="password" required autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

      <x-text-input wire:model="password_confirmation" id="password_confirmation"
        class="block mt-1 w-full" type="password" name="password_confirmation" required
        autocomplete="new-password" />

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-primary-button class="w-full justify-center">
        {{ __('Register') }}
      </x-primary-button>
    </div>

    <hr class="my-4">

    <span class="block text-center text-sm">
      @lang('Já possui uma conta?')
      <a href="{{ route('login') }}" class="font-semibold" wire:navigate>
        @lang('Login')
      </a>
    </span>
  </form>
</div>
