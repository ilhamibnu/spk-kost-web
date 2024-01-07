<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'tb_fasilitas';

    protected $fillable = [
        'name',
        'bobot'
    ];

    public function kost()
    {
        return $this->hasMany(Kost::class);
    }

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }
}
