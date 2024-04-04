<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkJob>
 */
class WorkJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'title' => fake()->domainName(),
            'location' => fake()->country(),
            'apply_url' => fake()->url(),
            'salary_min' => $min = fake()->numberBetween(1400, 6000),
            'salary_max' => $min + 1000,
            'pinned' => random_int(1, 5) == 5,
        ];
    }
}
