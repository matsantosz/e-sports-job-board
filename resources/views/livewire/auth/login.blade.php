<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(route('jobs.create', absolute: false), navigate: true);
};

?>

<div>
  <h2 class="text-center text-lg">
    @lang('Login')
  </h2>

  <hr class="my-4">

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form wire:submit="login">
    <!-- Email Address -->
    <div>
      <x-input-label for="email" :value="__('Email')" />

      <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
        name="email" required autofocus autocomplete="username" />

      <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Password')" />

      <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
        type="password" name="password" required autocomplete="current-password" />

      <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember" class="inline-flex items-center">
        <input wire:model="form.remember" id="remember" type="checkbox" name="remember"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

        <span class="ms-2 text-sm">
          {{ __('Remember me') }}
        </span>
      </label>
    </div>

    <div class="flex flex-col mt-4">
      <x-primary-button class="w-full justify-center">
        {{ __('Log in') }}
      </x-primary-button>

      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" wire:navigate class="text-sm text-center mt-4">
          {{ __('Forgot your password?') }}
        </a>
      @endif
    </div>

    <hr class="my-4">

    <span class="block text-center text-sm">
      @lang('Não possui uma conta?')
      <a href="{{ route('register') }}" class="font-semibold" wire:navigate>
        @lang('Register')
      </a>
    </span>
  </form>
</div>
