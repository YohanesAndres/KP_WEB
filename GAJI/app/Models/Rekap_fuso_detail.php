<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_fuso_detail extends Model
{
    use HasFactory;
    protected $table = "rekap_fuso_detail";

    public function UangJalan()
    {
        return $this->belongsTo(Uang_jalan::class, 'id_uang_jalan');
    }
}
