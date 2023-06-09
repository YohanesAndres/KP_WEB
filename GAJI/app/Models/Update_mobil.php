<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update_mobil extends Model
{
    use HasFactory;
    protected $table = "update_mobil";

    public function uangjalan()
    {
        return $this->belongsTo(Uang_jalan::class, 'id_uang_jalan','id');
    }
}
