<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tujuan;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_tujuan = [
            "DSAP-SAP",
            "DSAP-MM",
            "UANG BALIK",
            "CUCI TANGKI",
        ];

        foreach ($list_tujuan as $tujuan) {
            tujuan::create([
                'tujuan' => $tujuan,
            ]);
        }
    }
}
