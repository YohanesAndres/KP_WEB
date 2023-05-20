<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Muat_bongkar;

class MuatBongkarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $muat_bongkar_data =[
            [165000,'DSAP-SAP',1],[450000,'DSAP-MM',2],[200000,'UANG BALIK FUSO',3],[300000,'UANG BALIK TRONTON',3],[200000,'CUCI TANGKI',4],[50000,'UANG MAKAN HARI BIASA',5],
            [100000,'UANG MAKAN HARI MINGGU',5],[3400000,'CLC-SDS TRONTON 26 TON',6],[3500000,'CLC-SDS TRONTON 30 TON',6],[3550000,'CLC-SDS TRONTON 33 TON',6],[3400000,'SNI-CSI TRONTON 26 TON',7],[3500000,'SNI-CSI TRONTON 30 TON',7],
            [3550000,'SNI-CSI TRONTON 33 TON',7],[2600000,'GTA-TAIPAN TRONTON PLG',8],[2300000,'GTA-TAIPAN TRONTON LMPG',8],[2150000,'GTA-TAIPAN FUSO PLG',8],[1950000,'GTA-TAIPAN FUSO LMPG',8],[2600000,'GTA-LDC TRONTON PLG',9],
            [2300000,'GTA-LDC TRONTON LMPG',9],[2150000,'GTA-LDC FUSO PLG',9],[1950000,'GTA-LDC FUSO LMPG',9],[2600000,'GTA-SIP TRONTON PLG',10],[2300000,'GTA-SIP TRONTON LMPG',10],[2150000,'GTA-SIP FUSO PLG',10],
            [1950000,'GTA-SIP FUSO LMPG',10],[2600000,'GTA-TBL TRONTON PLG',11],[2300000,'GTA-TBL TRONTON LMPG',11],[2150000,'GTA-TBL FUSO PLG',11],[1950000,'GTA-TBL FUSO LMPG',11],[2600000,'GTA-DJ TRONTON PLG',12],
            [2300000,'GTA-DJ TRONTON LMPG',12],[2150000,'GTA-DJ FUSO PLG',12],[1950000,'GTA-DJ FUSO LMPG',12],[2600000,'SAG-LDC TRONTON PLG',13],[2300000,'SAG-LDC TRONTON LMPG',13],[2150000,'SAG-LDC FUSO PLG',13],
            [1950000,'SAG-LDC FUSO LMPG',13],
            [2600000,'SAG-SIP TRONTON PLG',14],
            [2300000,'SAG-SIP TRONTON LMPG',14],
            [2150000,'SAG-SIP FUSO PLG',14],
            [1950000,'SAG-SIP FUSO LMPG',14],
            [2600000,'SAG-TBL TRONTON PLG',15],
            [2300000,'SAG-TBL TRONTON LMPG',15],
            [2150000,'SAG-TBL FUSO PLG',15],
            [1950000,'SAG-TBL FUSO LMPG',15],
            [2600000,'SAG-DJ TRONTON PLG',16],
            [2300000,'SAG-DJ TRONTON LMPG',16],
            [2150000,'SAG-DJ FUSO PLG',16],
            [1950000,'SAG-DJ FUSO LMPG',16],
            [2350000,'AT-LDC TRONTON PLG',17],
            [2050000,'AT-LDC TRONTON LMPG',17],
            [2000000,'AT-LDC FUSO PLG',17],
            [1800000,'AT-LDC FUSO LMPG',17],
            [2350000,'AT-SIP TRONTON PLG',18],
            [2050000,'AT-SIP TRONTON LMPG',18],
            [2000000,'AT-SIP FUSO PLG',18],
            [1800000,'AT-SIP FUSO LMPG',18],
            [2350000,'AT-TBL TRONTON PLG',19],
            [2050000,'AT-TBL TRONTON LMPG',19],
            [2000000,'AT-TBL FUSO PLG',19],
            [1800000,'AT-TBL FUSO LMPG',19],
            [2350000,'AT-DJ TRONTON PLG',20],
            [2050000,'AT-DJ TRONTON LMPG',20],
            [2000000,'AT-DJ FUSO PLG',20],
            [1800000,'AT-DJ FUSO LMPG',20],
            [2350000,'MBJ-LDC TRONTON PLG',21],
            [2050000,'MBJ-LDC TRONTON LMPG',21],
            [1950000,'MBJ-LDC FUSO PLG',21],
            [1750000,'MBJ-LDC FUSO LMPG',21],
            [2350000,'MBJ-SIP TRONTON PLG',22],
            [2050000,'MBJ-SIP TRONTON LMPG',22],
            [1950000,'MBJ-SIP FUSO PLG',22],
            [1750000,'MBJ-SIP FUSO LMPG',22],
            [2350000,'MBJ-TBL TRONTON PLG',23],
            [2050000,'MBJ-TBL TRONTON LMPG',23],
            [1950000,'MBJ-TBL FUSO PLG',23],
            [1750000,'MBJ-TBL FUSO LMPG',23],
            [2350000,'MBJ-DJ TRONTON PLG',24],
            [2050000,'MBJ-DJ TRONTON LMPG',24],
            [1950000,'MBJ-DJ FUSO PLG',24],
            [1750000,'MBJ-DJ FUSO LMPG',24],
            [2350000,'MBJ-LAIS TRONTON PLG',25],
            [2050000,'MBJ-LAIS TRONTON LMPG',25],
            [1950000,'MBJ-LAIS FUSO PLG',25],
            [1750000,'MBJ-LAIS FUSO LMPG',25],
            [2600000,'TH-LDC TRONTON PLG',26],
            [2300000,'TH-LDC TRONTON LMPG',26],
            [2200000,'TH-LDC FUSO PLG',26],
            [2000000,'TH-LDC FUSO LMPG',26],
            [2600000,'TH-TBL TRONTON PLG',27],
            [2300000,'TH-TBL TRONTON LMPG',27],
            [2200000,'TH-TBL FUSO PLG',27],
            [2000000,'TH-TBL FUSO LMPG',27],
            [2600000,'TH-SIP TRONTON PLG',28],
            [2300000,'TH-SIP TRONTON LMPG',28],
            [2200000,'TH-SIP FUSO PLG',28],
            [2000000,'TH-SIP FUSO LMPG',28],
            [2600000,'TH-DJ TRONTON PLG',29],
            [2300000,'TH-DJ TRONTON LMPG',29],
            [2200000,'TH-DJ FUSO PLG',29],
            [2000000,'TH-DJ FUSO LMPG',29],
            [2600000,'TH-TAIPAN TRONTON PLG',30],
            [2300000,'TH-TAIPAN TRONTON LMPG',30],
            [2200000,'TH-TAIPAN FUSO PLG',30],
            [2000000,'TH-TAIPAN FUSO LMPG',30],
            
        ];

        foreach ($muat_bongkar_data as $key => $muat_bongkar) {
            Muat_bongkar::create([
                'uang_jalan' =>  $muat_bongkar[0],
                'muatBongkar' => $muat_bongkar[1],
                'id_tujuan' => $muat_bongkar[2]
                
            ]);
        }
    }
}

//         Muat_bongkar::create([
//             'uang_jalan' =>  165000,
//             'muatBongkar' => 'DSAP-SAP',
//             'id_tujuan' => 1
            
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   450000,
//             'muatBongkar' => 'DSAP-MM',
            
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   200000,
//             'muatBongkar' => 'UANG BALIK FUSO',
           
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   300000,
//             'muatBongkar' => 'UANG BALIK TRONTON',

//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   200000,
//             'muatBongkar' => 'CUCI TANGKI',
           
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   50000,
//             'muatBongkar' => 'UANG MAKAN HARI BIASA',

//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   100000,
//             'muatBongkar' => 'UANG MAKAN HARI MINGGU',
       
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   3400000,
//             'muatBongkar' => 'CLC-SDS TRONTON 26 TON',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   3500000,
//             'muatBongkar' => 'CLC-SDS TRONTON 30 TON',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   3550000,
//             'muatBongkar' => 'CLC-SDS TRONTON 33 TON',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   3400000,
//             'muatBongkar' => 'SNI-CSI TRONTON 26 TON',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   3500000,
//             'muatBongkar' => 'SNI-CSI TRONTON 30 TON',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   3550000,
//             'muatBongkar' => 'SNI-CSI TRONTON 33 TON',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'GTA-TAIPAN TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'GTA-TAIPAN TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'GTA-TAIPAN FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'GTA-TAIPAN FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'GTA-LDC TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'GTA-LDC TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'GTA-LDC FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'GTA-LDC FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'GTA-SIP TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'GTA-SIP TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'GTA-SIP FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'GTA-SIP FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'GTA-TBL TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'GTA-TBL TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'GTA-TBL FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'GTA-TBL FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'GTA-DJ TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'GTA-DJ TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'GTA-DJ FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'GTA-DJ FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'SAG-LDC TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'SAG-LDC TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'SAG-LDC FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'SAG-LDC FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'SAG-SIP TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'SAG-SIP TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'SAG-SIP FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'SAG-SIP FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'SAG-TBL TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'SAG-TBL TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'SAG-TBL FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'SAG-TBL FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'SAG-DJ TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'SAG-DJ TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2150000,
//             'muatBongkar' => 'SAG-DJ FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'SAG-DJ FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'AT-LDC TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'AT-LDC TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'AT-LDC FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1800000,
//             'muatBongkar' => 'AT-LDC FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'AT-SIP TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'AT-SIP TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'AT-SIP FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1800000,
//             'muatBongkar' => 'AT-SIP FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'AT-TBL TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'AT-TBL TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'AT-TBL FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1800000,
//             'muatBongkar' => 'AT-TBL FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'AT-DJ TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'AT-DJ TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'AT-DJ FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1800000,
//             'muatBongkar' => 'AT-DJ FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'MBJ-LDC TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'MBJ-LDC TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'MBJ-LDC FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1750000,
//             'muatBongkar' => 'MBJ-LDC FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'MBJ-SIP TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'MBJ-SIP TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'MBJ-SIP FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1750000,
//             'muatBongkar' => 'MBJ-SIP FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'MBJ-TBL TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'MBJ-TBL TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'MBJ-TBL FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1750000,
//             'muatBongkar' => 'MBJ-TBL FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'MBJ-DJ TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'MBJ-DJ TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'MBJ-DJ FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1750000,
//             'muatBongkar' => 'MBJ-DJ FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2350000,
//             'muatBongkar' => 'MBJ-LAIS TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2050000,
//             'muatBongkar' => 'MBJ-LAIS TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1950000,
//             'muatBongkar' => 'MBJ-LAIS FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   1750000,
//             'muatBongkar' => 'MBJ-LAIS FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'TH-LDC TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'TH-LDC TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2200000,
//             'muatBongkar' => 'TH-LDC FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'TH-LDC FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'TH-TBL TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'TH-TBL TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2200000,
//             'muatBongkar' => 'TH-TBL FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'TH-TBL FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'TH-SIP TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'TH-SIP TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2200000,
//             'muatBongkar' => 'TH-SIP FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'TH-SIP FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'TH-DJ TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'TH-DJ TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2200000,
//             'muatBongkar' => 'TH-DJ FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'TH-DJ FUSO LMPG',
//         ]);d

//         Muat_bongkar::create([
//             'uang_jalan' =>   2600000,
//             'muatBongkar' => 'TH-TAIPAN TRONTON PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2300000,
//             'muatBongkar' => 'TH-TAIPAN TRONTON LMPG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2200000,
//             'muatBongkar' => 'TH-TAIPAN FUSO PLG',
//         ]);d
//         Muat_bongkar::create([
//             'uang_jalan' =>   2000000,
//             'muatBongkar' => 'TH-TAIPAN FUSO LMPG',
//         ]);d
//     }
// }