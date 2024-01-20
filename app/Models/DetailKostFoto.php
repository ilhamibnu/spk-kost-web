<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKostFoto extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_foto_kost';

    protected $fillable = [
        'foto',
        'id_kost'
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost', 'id');
    }
}
