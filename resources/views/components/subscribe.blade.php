@props(['icon' => true])

<div class="flex flex-col items-center mb-8">
  @if ($icon)
    <x-filament::icon icon="heroicon-o-envelope" class="w-5 mx-auto mb-2" />
  @endif

  <span class="mb-4">
    @lang('Receba e-mails de novas vagas publicadas.')
  </span>

  <div class="flex items-center gap-1">
    <form autocomplete="off">
      <input type="email" placeholder="{{ __('Digite seu E-mail') }}"
        class="py-1 px-3 tracking-wide rounded-lg w-72" />

      <x-danger-button>
        @lang('Assinar')
      </x-danger-button>
    </form>
  </div>
</div>
