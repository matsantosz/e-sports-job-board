<div class="flex-1">
  <div class="mb-6 flex">
    <button class="flex-1 flex items-center gap-2 p-5 border border-gray-500">
      <div class="font-semibold">
        1.
      </div>

      @lang('Formulário')
    </button>

    <button class="flex-1 flex items-center gap-2 p-5 border border-gray-300 text-gray-500">
      <div class="font-semibold">
        2.
      </div>

      @lang('Pagamento')
    </button>
  </div>

  <form autocomplete="off">
    <div>
      <x-input-label for="title" :value="__('Título da Vaga')" />

      <x-text-input wire:model="title" id="title" class="block mt-1 w-full" type="text"
        name="title" required autofocus />

      <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="location" :value="__('Localização')" />

      <x-text-input wire:model="location" id="location" class="block mt-1 w-full" type="text"
        name="location" required />

      <x-input-error :messages="$errors->get('location')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="apply_url" :value="__('Link de Aplicação')" />

      <x-text-input wire:model="apply_url" id="apply_url" class="block mt-1 w-full" type="url"
        name="apply_url" required />

      <x-input-error :messages="$errors->get('apply_url')" class="mt-2" />
    </div>

    <div class="mt-4">
      <label for="featured" class="inline-flex items-center">
        <input wire:model="featured" id="featured" type="checkbox" name="featured"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

        <span class="ms-2 text-sm">
          {{ __('Destacar vaga') }}
        </span>
      </label>
    </div>

    <div id="bricks"></div>
  </form>
</div>

@script
  <script>
    const mp = new MercadoPago('TEST-c0693a33-d6e1-4c77-9705-287e17c8eaea')

    mp.bricks().create('payment', 'bricks', {
      initialization: {
        amount: 100,
        payer: {
          email: 'miliandroxd@gmail.com'
        }
      },
      customization: {
        paymentMethods: {
          creditCard: "all",
          debitCard: "all",
          ticket: "all",
          bankTransfer: "all",
          maxInstallments: 1
        },
      },
      callbacks: {
        onSubmit: (data) => {
          $wire.submit()
        },
        onError: (error) => {
          console.error(error)
        },
        onReady: () => {}
      },
    })
  </script>
@endscript
