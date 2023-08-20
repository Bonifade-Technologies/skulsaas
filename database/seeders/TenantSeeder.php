<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name' => 'bonifade'
        ]);
        Tenant::create([
            'name' => 'acce'
        ]);
    }
}