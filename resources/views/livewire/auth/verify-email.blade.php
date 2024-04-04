<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;

layout('layouts.guest');

$sendVerification = function () {
    if (Auth::user()->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('jobs.create', absolute: false), navigate: true);

        return;
    }

    Auth::user()->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<div>
  <div class="mb-4 text-sm text-gray-600">
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
  </div>

  @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
  @endif

  <x-primary-button wire:click="sendVerification" class="w-full justify-center mt-4">
    {{ __('Resend Verification Email') }}
  </x-primary-button>

  <hr class="my-4">

  <x-danger-button wire:click="logout" type="submit" class="w-full justify-center">
    {{ __('Log Out') }}
  </x-danger-button>
</div>
