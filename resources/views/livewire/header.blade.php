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
