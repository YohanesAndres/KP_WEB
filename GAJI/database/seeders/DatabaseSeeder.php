<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            NamaSopirSeeder::class,
            KategoriSeeder::class,
            KendaraanSeeder::class,
            TujuanSeeder::class,
            MuatBongkarSeeder::class,
            BossUserSeeder::class,
        ]);
    }
}
