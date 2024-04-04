<div class="h-[450px] mt-6 flex justify-center items-center">
  <div class="w-2/3">
    <x-filament::icon icon="heroicon-o-rocket-launch" class="w-8 mx-auto mb-2" />

    <h2 class="text-2xl text-center">
      @lang('Comece a contratar com o :name ainda hoje.', ['name' => config('app.name')])
    </h2>

    <h3 class="text-lg text-center mt-6">
      @lang('Cadastre-se gratuitamente e coloque sua empresa na frente de centenas de milhares de talentos dentro do E-sports.')
    </h3>

    <div class="flex justify-center mt-6">
      <a href="{{ route('jobs.create') }}" wire:navigate>
        <x-primary-button class="px-6">
          @lang('Começar')
        </x-primary-button>
      </a>
    </div>
  </div>
</div>
