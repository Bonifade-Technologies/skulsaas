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
            'session_name' => '2022/23',
            'session_start' => now()->subYear()->subMonths(4),
            'session_end' => now()->subMonths(random_int(1, 4))
        ]);
        Year::create([
            'session_name' => '2023/24',
            'session_start' => now()->subMonths(4),
            'session_end' => now()->addYear()->subMonths(random_int(1, 4))
        ]);
    }
}