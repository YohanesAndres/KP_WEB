<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_jalan extends Model
{
    use HasFactory;
    protected $table = "uang_jalan";

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }

    public function update_mobil()
    {
        return $this->hasOne(update_mobil::class, 'id_uang_jalan',"id");
    }

    public function muatbongkar()
    {
        return $this->belongsTo(Muat_bongkar::class, 'id_muat_bongkar');
    }

    public function namaSopir()
    {
        return $this->hasOneThrough(Namasopir::class, Kendaraan::class, 'id', 'id', 'id_kendaraan', 'id_namasopir');
    }
}
