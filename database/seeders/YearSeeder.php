<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::create([
            'name' => '2022/23',
            'start' => now()->subYear()->subMonths(4),
            'end' => now()->subMonths(random_int(1, 4))
        ]);
        Year::create([
            'name' => '2023/24',
            'start' => now()->subMonths(4),
            'end' => now()->addYear()->subMonths(random_int(1, 4))
        ]);
    }
}