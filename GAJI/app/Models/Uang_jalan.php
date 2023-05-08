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

    public function muatbongkar()
    {
        return $this->belongsTo(Muat_bongkar::class, 'id_muat_bongkar');
    }
}
