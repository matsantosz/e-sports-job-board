<?php

namespace App\Livewire\Jobs;

use App\Models\WorkJob;
use Livewire\Attributes\Validate;
use Livewire\Component;

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

    public function submit(): void
    {
        $this->validate();

        WorkJob::create([
            ...$this->all(),
            'company_id' => 1,
        ]);

        $this->redirect(route('jobs'), navigate: true);
    }

    public function render()
    {
        return view('livewire.jobs.new-job-form');
    }
}
