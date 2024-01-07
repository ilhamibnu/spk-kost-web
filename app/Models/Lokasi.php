<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'tb_lokasi';

    protected $fillable = [
        'name',
        'bobot'
    ];

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }

    public function kost()
    {
        return $this->hasMany(Kost::class);
    }
}
