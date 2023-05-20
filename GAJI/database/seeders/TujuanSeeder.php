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
            "DSAP-SAP", //1
            "DSAP-MM", //2
            "UANG BALIK", //3
            "CUCI TANGKI", //4
            "UANG MAKAN", //5
            "CLC-SDS", //6
            "SNI-CSI", //7
            "GTA-TAIPAN", //8
            "GTA-LDC", //9
            "GTA-SIP", //10
            "GTA-TBL", //11
            "GTA-DJ", //12
            "SAG-LDC", //13
            "SAG-SIP", //14
            "SAG-TBL", //15
            "SAG-DJ", //16
            "AT-LDC", //17
            "AT-SIP", //18
            "AT-TBL", //19
            "AT-DJ", //20
            "MBJ-LDC", //21
            "MBJ-SIP", //22
            "MBJ-TBL", //23
            "MBJ-DJ", //24
            "MBJ-LAIS", //25
            "TH-LDC", //26
            "TH-TBL", //27
            "TH-SIP", //28
            "TH-DJ", //29
            "TH-TAIPAN", //30
        ];

        foreach ($list_tujuan as $tujuan) {
            tujuan::create([
                'tujuan' => $tujuan,
            ]);
        }
    }
}
