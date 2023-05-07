<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namasopir extends Model
{
    use HasFactory;
    protected $table = "namasopir";
    
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'id_namasopir', 'id');
    }
}
