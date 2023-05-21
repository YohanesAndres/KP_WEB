<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muat_bongkar extends Model
{
    use HasFactory;
    protected $table = "muat_bongkar";

    public function uang_jalan()
    {
        return $this->belongsTo(Uang_jalan::class, 'id_muat_bongkar');
    }

    public function tujuan()
    {
        return $this->belongsTo(tujuan::class, 'id_tujuan');
    }

}
