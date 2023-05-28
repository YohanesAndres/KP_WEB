<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class BossUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Boss',
            'email' => 'boss@gmail.com',
            'password' => bcrypt('bossboss'), // Ganti 'password' dengan password yang diinginkan
            'role' => 'boss',
        ]);


    }
}
