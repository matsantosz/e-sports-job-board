<?php

namespace App\Livewire\Jobs;

use App\Models\WorkJob;
use Livewire\Component;

class RecentJobs extends Component
{
    public function render()
    {
        $jobs = WorkJob::query()
            ->with('company:id,name,logo')
            ->where('pinned', true)
            ->latest()
            ->get();

        return view('livewire.jobs.recent-jobs', compact('jobs'));
    }
}
