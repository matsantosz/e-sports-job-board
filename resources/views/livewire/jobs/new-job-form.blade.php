<div>
  <form wire:submit="submit" autocomplete="off">
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

    <x-primary-button class="w-full justify-center">
      {{ __('Publicar') }}
    </x-primary-button>
  </form>
</div>
