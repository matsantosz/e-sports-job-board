<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-sans antialiased text-gray-700">
    <header class="max-w-4xl mx-auto px-6 sm:px-0">
      <nav class="flex items-center py-6">
        <a href="{{ route('landing') }}" class="text-3xl font-bold tracking-wide" wire:navigate>
          {{ config('app.name') }}
        </a>

        <div class="ml-auto">
          <a href="{{ route('jobs.create') }}" wire:navigate>
            <x-primary-button>
              @lang('Publicar Vaga')
            </x-primary-button>
          </a>
        </div>
      </nav>
    </header>

    <main class="max-w-4xl mx-auto">
      {{ $slot }}
    </main>

    <footer class="max-w-4xl mx-auto mb-12">
      <p class="text-sm text-center">
        &copy; {{ date('Y') }} {{ config('app.name') }} - @lang('Todos os direitos reservados')
      </p>
    </footer>
  </body>
</html>
