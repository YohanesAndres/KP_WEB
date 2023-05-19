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
        Muat_bongkar::create([
            'uang_jalan' =>  165000,
            'muatBongkar' => 'DSAP-SAP',
            'tujuan' => 'DSAP-SAP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   450000,
            'muatBongkar' => 'DSAP-MM',
            'tujuan' => 'DSAP-MM',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   200000,
            'muatBongkar' => 'UANG BALIK FUSO',
            'tujuan' => 'UANG BALIK',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   300000,
            'muatBongkar' => 'UANG BALIK TRONTON',
            'tujuan' => 'UANG BALIK',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   200000,
            'muatBongkar' => 'CUCI TANGKI',
            'tujuan' => 'CUCI TANGKI',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   50000,
            'muatBongkar' => 'UANG MAKAN HARI BIASA',
            'tujuan' => 'UANG MAKAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   100000,
            'muatBongkar' => 'UANG MAKAN HARI MINGGU',
            'tujuan' => 'UANG MAKAN',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   3400000,
            'muatBongkar' => 'CLC-SDS TRONTON 26 TON',
            'tujuan' => 'CLC-SDS',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   3500000,
            'muatBongkar' => 'CLC-SDS TRONTON 30 TON',
            'tujuan' => 'CLC-SDS',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   3550000,
            'muatBongkar' => 'CLC-SDS TRONTON 33 TON',
            'tujuan' => 'CLC-SDS',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   3400000,
            'muatBongkar' => 'SNI-CSI TRONTON 26 TON',
            'tujuan' => 'SNI-CSI',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   3500000,
            'muatBongkar' => 'SNI-CSI TRONTON 30 TON',
            'tujuan' => 'SNI-CSI',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   3550000,
            'muatBongkar' => 'SNI-CSI TRONTON 33 TON',
            'tujuan' => 'SNI-CSI',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'GTA-TAIPAN TRONTON PLG',
            'tujuan' => 'GTA-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'GTA-TAIPAN TRONTON LMPG',
            'tujuan' => 'GTA-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'GTA-TAIPAN FUSO PLG',
            'tujuan' => 'GTA-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'GTA-TAIPAN FUSO LMPG',
            'tujuan' => 'GTA-TAIPAN',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'GTA-LDC TRONTON PLG',
            'tujuan' => 'GTA-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'GTA-LDC TRONTON LMPG',
            'tujuan' => 'GTA-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'GTA-LDC FUSO PLG',
            'tujuan' => 'GTA-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'GTA-LDC FUSO LMPG',
            'tujuan' => 'GTA-LDC',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'GTA-SIP TRONTON PLG',
            'tujuan' => 'GTA-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'GTA-SIP TRONTON LMPG',
            'tujuan' => 'GTA-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'GTA-SIP FUSO PLG',
            'tujuan' => 'GTA-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'GTA-SIP FUSO LMPG',
            'tujuan' => 'GTA-SIP',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'GTA-TBL TRONTON PLG',
            'tujuan' => 'GTA-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'GTA-TBL TRONTON LMPG',
            'tujuan' => 'GTA-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'GTA-TBL FUSO PLG',
            'tujuan' => 'GTA-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'GTA-TBL FUSO LMPG',
            'tujuan' => 'GTA-TBL',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'GTA-DJ TRONTON PLG',
            'tujuan' => 'GTA-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'GTA-DJ TRONTON LMPG',
            'tujuan' => 'GTA-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'GTA-DJ FUSO PLG',
            'tujuan' => 'GTA-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'GTA-DJ FUSO LMPG',
            'tujuan' => 'GTA-DJ',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'SAG-LDC TRONTON PLG',
            'tujuan' => 'SAG-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'SAG-LDC TRONTON LMPG',
            'tujuan' => 'SAG-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'SAG-LDC FUSO PLG',
            'tujuan' => 'SAG-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'SAG-LDC FUSO LMPG',
            'tujuan' => 'SAG-LDC',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'SAG-SIP TRONTON PLG',
            'tujuan' => 'SAG-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'SAG-SIP TRONTON LMPG',
            'tujuan' => 'SAG-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'SAG-SIP FUSO PLG',
            'tujuan' => 'SAG-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'SAG-SIP FUSO LMPG',
            'tujuan' => 'SAG-SIP',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'SAG-TBL TRONTON PLG',
            'tujuan' => 'SAG-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'SAG-TBL TRONTON LMPG',
            'tujuan' => 'SAG-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'SAG-TBL FUSO PLG',
            'tujuan' => 'SAG-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'SAG-TBL FUSO LMPG',
            'tujuan' => 'SAG-TBL',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'SAG-DJ TRONTON PLG',
            'tujuan' => 'SAG-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'SAG-DJ TRONTON LMPG',
            'tujuan' => 'SAG-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2150000,
            'muatBongkar' => 'SAG-DJ FUSO PLG',
            'tujuan' => 'SAG-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'SAG-DJ FUSO LMPG',
            'tujuan' => 'SAG-DJ',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'AT-LDC TRONTON PLG',
            'tujuan' => 'AT-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'AT-LDC TRONTON LMPG',
            'tujuan' => 'AT-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'AT-LDC FUSO PLG',
            'tujuan' => 'AT-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1800000,
            'muatBongkar' => 'AT-LDC FUSO LMPG',
            'tujuan' => 'AT-LDC',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'AT-SIP TRONTON PLG',
            'tujuan' => 'AT-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'AT-SIP TRONTON LMPG',
            'tujuan' => 'AT-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'AT-SIP FUSO PLG',
            'tujuan' => 'AT-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1800000,
            'muatBongkar' => 'AT-SIP FUSO LMPG',
            'tujuan' => 'AT-SIP',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'AT-TBL TRONTON PLG',
            'tujuan' => 'AT-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'AT-TBL TRONTON LMPG',
            'tujuan' => 'AT-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'AT-TBL FUSO PLG',
            'tujuan' => 'AT-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1800000,
            'muatBongkar' => 'AT-TBL FUSO LMPG',
            'tujuan' => 'AT-TBL',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'AT-DJ TRONTON PLG',
            'tujuan' => 'AT-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'AT-DJ TRONTON LMPG',
            'tujuan' => 'AT-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'AT-DJ FUSO PLG',
            'tujuan' => 'AT-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1800000,
            'muatBongkar' => 'AT-DJ FUSO LMPG',
            'tujuan' => 'AT-DJ',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'MBJ-LDC TRONTON PLG',
            'tujuan' => 'MBJ-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'MBJ-LDC TRONTON LMPG',
            'tujuan' => 'MBJ-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'MBJ-LDC FUSO PLG',
            'tujuan' => 'MBJ-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1750000,
            'muatBongkar' => 'MBJ-LDC FUSO LMPG',
            'tujuan' => 'MBJ-LDC',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'MBJ-SIP TRONTON PLG',
            'tujuan' => 'MBJ-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'MBJ-SIP TRONTON LMPG',
            'tujuan' => 'MBJ-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'MBJ-SIP FUSO PLG',
            'tujuan' => 'MBJ-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1750000,
            'muatBongkar' => 'MBJ-SIP FUSO LMPG',
            'tujuan' => 'MBJ-SIP',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'MBJ-TBL TRONTON PLG',
            'tujuan' => 'MBJ-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'MBJ-TBL TRONTON LMPG',
            'tujuan' => 'MBJ-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'MBJ-TBL FUSO PLG',
            'tujuan' => 'MBJ-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1750000,
            'muatBongkar' => 'MBJ-TBL FUSO LMPG',
            'tujuan' => 'MBJ-TBL',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'MBJ-DJ TRONTON PLG',
            'tujuan' => 'MBJ-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'MBJ-DJ TRONTON LMPG',
            'tujuan' => 'MBJ-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'MBJ-DJ FUSO PLG',
            'tujuan' => 'MBJ-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1750000,
            'muatBongkar' => 'MBJ-DJ FUSO LMPG',
            'tujuan' => 'MBJ-DJ',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2350000,
            'muatBongkar' => 'MBJ-LAIS TRONTON PLG',
            'tujuan' => 'MBJ-LAIS',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2050000,
            'muatBongkar' => 'MBJ-LAIS TRONTON LMPG',
            'tujuan' => 'MBJ-LAIS',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1950000,
            'muatBongkar' => 'MBJ-LAIS FUSO PLG',
            'tujuan' => 'MBJ-LAIS',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   1750000,
            'muatBongkar' => 'MBJ-LAIS FUSO LMPG',
            'tujuan' => 'MBJ-LAIS',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'TH-LDC TRONTON PLG',
            'tujuan' => 'TH-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'TH-LDC TRONTON LMPG',
            'tujuan' => 'TH-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2200000,
            'muatBongkar' => 'TH-LDC FUSO PLG',
            'tujuan' => 'TH-LDC',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'TH-LDC FUSO LMPG',
            'tujuan' => 'TH-LDC',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'TH-TBL TRONTON PLG',
            'tujuan' => 'TH-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'TH-TBL TRONTON LMPG',
            'tujuan' => 'TH-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2200000,
            'muatBongkar' => 'TH-TBL FUSO PLG',
            'tujuan' => 'TH-TBL',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'TH-TBL FUSO LMPG',
            'tujuan' => 'TH-TBL',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'TH-SIP TRONTON PLG',
            'tujuan' => 'TH-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'TH-SIP TRONTON LMPG',
            'tujuan' => 'TH-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2200000,
            'muatBongkar' => 'TH-SIP FUSO PLG',
            'tujuan' => 'TH-SIP',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'TH-SIP FUSO LMPG',
            'tujuan' => 'TH-SIP',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'TH-DJ TRONTON PLG',
            'tujuan' => 'TH-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'TH-DJ TRONTON LMPG',
            'tujuan' => 'TH-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2200000,
            'muatBongkar' => 'TH-DJ FUSO PLG',
            'tujuan' => 'TH-DJ',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'TH-DJ FUSO LMPG',
            'tujuan' => 'TH-DJ',
        ]);

        Muat_bongkar::create([
            'uang_jalan' =>   2600000,
            'muatBongkar' => 'TH-TAIPAN TRONTON PLG',
            'tujuan' => 'TH-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2300000,
            'muatBongkar' => 'TH-TAIPAN TRONTON LMPG',
            'tujuan' => 'TH-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2200000,
            'muatBongkar' => 'TH-TAIPAN FUSO PLG',
            'tujuan' => 'TH-TAIPAN',
        ]);
        Muat_bongkar::create([
            'uang_jalan' =>   2000000,
            'muatBongkar' => 'TH-TAIPAN FUSO LMPG',
            'tujuan' => 'TH-TAIPAN',
        ]);
    }
}
