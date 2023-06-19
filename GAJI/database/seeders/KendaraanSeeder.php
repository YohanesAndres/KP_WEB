<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #FUSO KITA
        Kendaraan::create([
            'plat' => 'BG 8795 UT',
            'tonase' => 17600,
            'id_namasopir' => 1,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'B 9852 WV',
            'tonase' => 18000,
            'id_namasopir' => 2,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'B 9853 WV',
            'tonase' => 20500,
            'id_namasopir' => 3,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'B 9854 WV',
            'tonase' => 18000,
            'id_namasopir' => 4,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'B 9855 WV',
            'tonase' => 18000,
            'id_namasopir' => 5,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'B 9856 WV',
            'tonase' => 18000,
            'id_namasopir' => 6,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8823 US',
            'tonase' => 20000,
            'id_namasopir' => 7,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8824 US',
            'tonase' => 20300,
            'id_namasopir' => 8,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8825 US',
            'tonase' => 20300,
            'id_namasopir' => 9,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8826 US',
            'tonase' => 20000,
            'id_namasopir' => 10,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8827 US',
            'tonase' => 20000,
            'id_namasopir' => 11,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8027 IG',
            'tonase' => 18500,
            'id_namasopir' => 12,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8028 IG',
            'tonase' => 20500,
            'id_namasopir' => 13,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8029 IG',
            'tonase' => 17800,
            'id_namasopir' => 14,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8030 IG',
            'tonase' => 20000,
            'id_namasopir' => 15,
            'id_kategori' => 1,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8031 IG',
            'tonase' => 17400,
            'id_namasopir' => 16,
            'id_kategori' => 1,
        ]);

        #FUSO OM
        Kendaraan::create([
            'plat' => 'BG 8261 IG',
            'tonase' => 0,
            'id_namasopir' => 17,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8629 UQ',
            'tonase' => 19800,
            'id_namasopir' => 18,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8373 IK',
            'tonase' => 20300,
            'id_namasopir' => 19,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8352 OG',
            'tonase' => 20300,
            'id_namasopir' => 20,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8304 IG',
            'tonase' => 19000,
            'id_namasopir' => 21,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8087 IX',
            'tonase' => 20300,
            'id_namasopir' => 22,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8911 PJ', #BG 8881 SI ATAU BG 8911 PJ'
            'tonase' => 19000,
            'id_namasopir' => 23,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8912 PJ', #BG 8883 SI ATAU BG 8912 PJ
            'tonase' => 18600,
            'id_namasopir' => 24,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8290 NQ',
            'tonase' => 20300,
            'id_namasopir' => 25,
            'id_kategori' => 2,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8021 IO',
            'tonase' => 18600,
            'id_namasopir' => 26,
            'id_kategori' => 2,
        ]);

        #TRONTON KITA
        Kendaraan::create([
            'plat' => 'BG 8036 ID',
            'tonase' => 25000,
            'id_namasopir' => 27,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8212 UY',
            'tonase' => 26000,
            'id_namasopir' => 28,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8213 UY',
            'tonase' => 26000,
            'id_namasopir' => 29,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8214 UY',
            'tonase' => 26000,
            'id_namasopir' => 30,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8215 UY',
            'tonase' => 26000,
            'id_namasopir' => 31,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8216 UY',
            'tonase' => 26000,
            'id_namasopir' => 32,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8692 UW',
            'tonase' => 26000,
            'id_namasopir' => 33,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8695 UW',
            'tonase' => 25800,
            'id_namasopir' => 34,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8433 UW',
            'tonase' => 30500,
            'id_namasopir' => 35,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8434 UW',
            'tonase' => 0,
            'id_namasopir' => 36,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8452 LR',
            'tonase' => 30400,
            'id_namasopir' => 37,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8453 LR',
            'tonase' => 30500,
            'id_namasopir' => 38,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8454 LR',
            'tonase' => 30500,
            'id_namasopir' => 39,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8417 NQ',
            'tonase' => 30500,
            'id_namasopir' => 40,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8421 NQ',
            'tonase' => 30500,
            'id_namasopir' => 41,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8422 NQ',
            'tonase' => 30500,
            'id_namasopir' => 42,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8423 NQ',
            'tonase' => 30500,
            'id_namasopir' => 43,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8424 NQ',
            'tonase' => 30500,
            'id_namasopir' => 44,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8425 NQ',
            'tonase' => 30500,
            'id_namasopir' => 45,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8426 NQ',
            'tonase' => 30500,
            'id_namasopir' => 46,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8427 NQ',
            'tonase' => 30500,
            'id_namasopir' => 47,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8428 NQ',
            'tonase' => 30500,
            'id_namasopir' => 48,
            'id_kategori' => 3,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8429 NQ',
            'tonase' => 30500,
            'id_namasopir' => 49,
            'id_kategori' => 3,
        ]);

        #TRONTON KO ASIONG
        Kendaraan::create([
            'plat' => 'B 9337 FW',
            'tonase' => 27300,
            'id_namasopir' => 50,
            'id_kategori' => 4,
        ]);
        Kendaraan::create([
            'plat' => 'B 9059 SYL',
            'tonase' => 26000,
            'id_namasopir' => 51,
            'id_kategori' => 4,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8386 AO',
            'tonase' => 26000,
            'id_namasopir' => 52,
            'id_kategori' => 4,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8387 AO',
            'tonase' => 30000,
            'id_namasopir' => 53,
            'id_kategori' => 4,
        ]);
        Kendaraan::create([
            'plat' => 'BG 8305 UN',
            'tonase' => 28000,
            'id_namasopir' => 54,
            'id_kategori' => 4,
        ]);
        Kendaraan::create([
            'plat' => 'BH 8733 LL',
            'tonase' => 26000,
            'id_namasopir' => 55,
            'id_kategori' => 4,
        ]);

        
    }

}
