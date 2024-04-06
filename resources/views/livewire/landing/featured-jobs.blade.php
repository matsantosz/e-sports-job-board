<div class="px-6 sm:px-0">
  <div class="flex justify-center items-center gap-2 mb-8">
    <h2 class="text-2xl">
      @lang('Vagas em destaque')
    </h2>

    <x-filament::icon icon="heroicon-o-check-badge" class="w-5" />
  </div>

  <div class="flex flex-col gap-4">
    @foreach ($jobs as $job)
      <a href="{{ $job->apply_url }}" @class([
          'flex items-center gap-4 relative shadow shadow-gray-400 rounded-lg py-4 pl-14 pr-4 ml-10 hover:scale-[1.01] transition',
          'bg-gray-200' => $job->featured,
      ])>
        <img src="{{ $job->company->logo }}" alt="{{ $job->company->name }} Logo"
          class="w-20 h-20 rounded-lg absolute -left-10">

        <div class="flex justify-between items-end flex-1">
          <div>
            <h4 class="text-sm capitalize">
              {{ $job->company->name }}
            </h4>

            <h3 class="font-semibold text-lg capitalize">
              {{ $job->title }}
            </h3>

            <div class="flex items-center gap-1">
              <x-filament::icon icon="heroicon-o-map-pin" class="w-4" />

              <p class="text-sm capitalize">
                {{ $job->location }}
              </p>

              @if (isset($job->salary_min, $job->salary_max))
                <x-filament::icon icon="heroicon-o-currency-dollar" class="w-4" />

                <p class="text-sm capitalize">
                  R${{ $job->salary_min }} - R${{ $job->salary_max }}
                </p>
              @endif
            </div>
          </div>

          <div class="flex items-start gap-1">
            <x-filament::icon icon="heroicon-o-calendar-days" class="w-4" />

            <p class="text-sm capitalize">
              {{ $job->created_at->diffForHumans() }}
            </p>
          </div>
        </div>

        @if ($job->featured)
          <div class="absolute top-4 right-4">
            <x-filament::icon icon="heroicon-o-check-badge" class="w-5" />
          </div>
        @endif
      </a>
    @endforeach
  </div>

  <div class="flex justify-center mt-8">
    <a href="{{ route('jobs') }}" wire:navigate>
      <x-primary-button class="px-6">
        @lang('Todas as Vagas')
      </x-primary-button>
    </a>
  </div>
</div>
