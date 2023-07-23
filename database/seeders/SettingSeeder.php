<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'school_name' => 'Bonifade SMS',
            'school_email' => 'info@bonifade.com',
            'school_country' => 'nigeria',
            'school_phone' => '7065720177',
            'country_code' => '+234',
        ]);
    }
}