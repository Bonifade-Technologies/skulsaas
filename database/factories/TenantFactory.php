<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['created', 'active', 'expired', 'inactive', 'deleted'];
        return [
            'name' => fake()->company(),
            'domain' => fake()->domainName(),
            'created_at' => now()->subDays(random_int(7, 2800)),
            'status' => $status[array_rand($status)],
        ];
    }
}