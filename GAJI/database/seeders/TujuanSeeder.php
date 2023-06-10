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
            ["DSAP-SAP", "Sekip"], //1
            ["DSAP-MM", "Sekip2"], //2
            ["UANG BALIK", "Sekip3"], //3
            ["CUCI TANGKI", "Sekip"], //4
            ["UANG MAKAN", "Sekip"], //5
            ["CLC-SDS", "Sekip"], //6
            ["SNI-CSI", "Sekip"], //7
            ["GTA-TAIPAN", "Sekip"], //8
            ["GTA-LDC", "Sekip"], //9
            ["GTA-SIP", "Sekip"], //10
            ["GTA-TBL", "Sekip"], //11
            ["GTA-DJ", "Sekip"], //12
            ["SAG-LDC", "Sekip"], //13
            ["SAG-SIP", "Sekip"], //14
            ["SAG-TBL", "Sekip"], //15
            ["SAG-DJ", "Sekip"], //16
            ["AT-LDC", "Sekip"], //17
            ["AT-SIP", "Sekip"], //18
            ["AT-TBL", "Sekip"], //19
            ["AT-DJ", "Sekip"], //20
            ["MBJ-LDC", "Sekip"], //21
            ["MBJ-SIP", "Sekip"], //22
            ["MBJ-TBL", "Sekip"], //23
            ["MBJ-DJ", "Sekip"], //24
            ["MBJ-LAIS", "Sekip"], //25
            ["TH-LDC", "Sekip"], //26
            ["TH-TBL", "Sekip"], //27
            ["TH-SIP", "Sekip"], //28
            ["TH-DJ", "Sekip"], //29
            ["TH-TAIPAN", "Sekip"], //30
        ];

        foreach ($list_tujuan as $tujuan) {
            tujuan::create([
                'tujuan' => $tujuan[0],
                'alamat' => $tujuan[1],
            ]);
        }
    }
}
