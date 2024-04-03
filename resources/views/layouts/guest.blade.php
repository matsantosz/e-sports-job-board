<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-sans antialiased bg-gray-300">
    <div class="min-h-screen flex flex-col justify-center items-center">
      <a href="/" wire:navigate>
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>

      <div class="w-full sm:max-w-md mt-6 p-6 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
      </div>
    </div>
  </body>
</html>
