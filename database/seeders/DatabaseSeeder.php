<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Year;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            LaratrustSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            YearSeeder::class,
            TermSeeder::class,
        ]);
    }
}