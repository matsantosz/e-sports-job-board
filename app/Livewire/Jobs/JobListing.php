<?php

namespace App\Livewire\Jobs;

use App\Models\WorkJob;
use Livewire\Component;

class JobListing extends Component
{
    public function render()
    {
        $jobs = WorkJob::query()
            ->with('company:id,name,logo')
            ->orderBy('pinned', 'desc')
            ->latest()
            ->get();

        return view('livewire.jobs.job-listing', compact('jobs'));
    }
}
