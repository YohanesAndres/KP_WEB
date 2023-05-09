<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama' => 'FUSO KITA',
        ]);
        Kategori::create([
            'nama' => 'FUSO OM',
        ]);
        Kategori::create([
            'nama' => 'TRONTON KITA',
        ]);
        Kategori::create([
            'nama' => 'TRONTON KO ASIONG',
        ]);
        Kategori::create([
            'nama' => 'RAGASA KITA',
        ]);
        Kategori::create([
            'nama' => 'RAGASA KO ASIONG',
        ]);
    }
}
