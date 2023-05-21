<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_tonase extends Model
{
    use HasFactory;
    protected $table = "data_tonase";

    public function muatbongkar()
    {
        return $this->belongsTo(Muat_bongkar::class, 'id_muat_bongkar');
    }

    public function tujuan()
    {
        return $this->belongsTo(tujuan::class, 'id_tujuan');
    }
}
