<div class="flex flex-col gap-4 mb-12">
  @foreach ($jobs as $job)
    <a href="{{ $job->apply_url }}"
      class="flex items-center gap-4 relative shadow-sm shadow-gray-400 rounded-lg py-4 pl-14 pr-4 ml-10 hover:scale-[1.01] transition">
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

      @if ($job->pinned)
        <div class="absolute top-2 right-4">
          <x-filament::icon icon="heroicon-m-check-badge" :tooltip="__('Destaque')" class="w-5" />
        </div>
      @endif
    </a>
  @endforeach
</div>