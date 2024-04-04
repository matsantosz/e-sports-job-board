<?php

namespace App\Livewire\Jobs;

use App\Models\Company;
use App\Models\WorkJob;
use Livewire\Component;

class JobCount extends Component
{
    public function render()
    {
        $jobCount = WorkJob::count();
        $companyCount = Company::count();

        return view('livewire.jobs.job-count', compact('jobCount', 'companyCount'));
    }
}
