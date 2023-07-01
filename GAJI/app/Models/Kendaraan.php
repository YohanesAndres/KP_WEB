<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = "kendaraan";

    public function uang_jalan()
    {
        return $this->hasMany(Uang_jalan::class, 'id_kendaraan', 'id');
    }

    public function namasopir()
    {
        return $this->belongsTo(User::class, 'id_namasopir', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    
}
