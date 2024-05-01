<?php

namespace App\Livewire\Jobs;

use Livewire\Attributes\Validate;
use Livewire\Component;
use MercadoPago\Client\Preference\PreferenceClient;

class NewJobForm extends Component
{
    #[Validate('required|string')]
    public string $title = '';

    #[Validate('required|string')]
    public string $location = '';

    #[Validate('string|url:http,https')]
    public string $apply_url = '';

    #[Validate('boolean')]
    public bool $featured = false;

    public string $currentTab = 'form';

    public function switchTab($tab): void
    {
        $this->currentTab = $tab;
    }

    public function submit(): void
    {
        $this->validate();

        $preference = (new PreferenceClient)->create([
            'items' => [
                [
                    'title' => 'Publicar nova vaga no E-sports',
                    'quantity' => 1,
                    'unit_price' => 100,
                    'currency_id' => 'BRL',
                ],
            ],
            'payer' => [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
            'payment_methods' => [
                'installments' => 1,
            ],
            'back_urls' => [
                'success' => route('jobs.create'),
                'failure' => route('jobs.create'),
                'pending' => route('jobs.create'),
            ],
            'auto_return' => 'approved',
        ]);

        $this->redirect($preference->init_point);
    }

    public function render()
    {
        return view('livewire.jobs.new-job-form');
    }
}
