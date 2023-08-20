<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Bowofade Oyerinde",
            'email' => 'oyer@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->tenants()->attach([1, 2, 3, 4]);
        $user->attachRoles([1, 2]);
    }
}