<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_fuso extends Model
{
    use HasFactory;
    protected $table = "rekap_fuso";

    public function dataTonase()
    {
        return $this->belongsTo(Data_tonase::class, 'id_dataTonase');
    }
}
