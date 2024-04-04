<?php

namespace App\Livewire\Landing;

use App\Models\WorkJob;
use Livewire\Component;

class FeaturedJobs extends Component
{
    public function render()
    {
        $jobs = WorkJob::query()
            ->with('company:id,name,logo')
            ->where('featured', true)
            ->latest()
            ->get();

        return view('livewire.landing.featured-jobs', compact('jobs'));
    }
}
