<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $yr = [1, 2];
        $terms = ["first", "second", "third"];
        for ($i = 0; $i < count($yr); $i++) {
            for ($j = 0; $j < count($terms); $j++) {
                Term::create([
                    'year_id' => $yr[$i],
                    'name' => $terms[$j],
                    'dso' => random_int(100, 180),
                    'start' => now()->subMonths(random_int(2, 8)),
                    'end' => now()->addYear()->subMonths(random_int(1, 4))
                ]);
            }
        }

    }
}