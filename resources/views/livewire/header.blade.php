<header class="max-w-4xl mx-auto">
  <nav class="flex py-6">
    <a href="{{ url('/') }}" wire:navigate class="text-3xl font-bold tracking-wider">
      {{ config('app.name') }}
    </a>

    <div class="ml-auto">
      <a href="" wire:navigate>
        <x-primary-button>
          @lang('Publicar Vaga')
        </x-primary-button>
      </a>
    </div>
  </nav>
</header>
