<header class="max-w-4xl mx-auto">
  <nav class="flex items-center py-6">
    <a href="{{ route('landing') }}" class="text-3xl font-bold tracking-wide" wire:navigate>
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
