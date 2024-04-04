<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkJob;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        WorkJob::factory(20)->create();
    }
}
