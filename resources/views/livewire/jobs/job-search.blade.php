<div class="my-12">
  <h2 class="mb-8 text-center text-2xl font-bold tracking-wide">
    @lang('Sua vaga no :s está te esperando.', ['s' => 'E-sports'])
  </h2>

  <div
    class="bg-white rounded-lg overflow-hidden mx-auto flex items-center w-2/3 border-2 border-gray-400">
    <x-filament::icon icon="heroicon-m-magnifying-glass" class="w-5 ml-2 mr-1 text-gray-400" />

    <input type="text" placeholder="Pesquise por vagas"
      class="p-1 flex-1 border-none tracking-wide focus:ring-0" autofocus>
  </div>
</div>
