<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $table = 'tb_kost';

    protected $fillable = [
        'name',
        'id_aksesjalan',
        'id_fasilitas',
        'id_jarak',
        'id_harga',
        'id_keamanan',
        'id_lokasi',

    ];

    public function alternatif()
    {
        return $this->hasMany(Alternatif::class, 'id_kost');
    }

    public function simpankost()
    {
        return $this->hasMany(SimpanKost::class, 'id_kost');
    }

    public function aksesjalan()
    {
        return $this->belongsTo(AksesJalan::class, 'id_aksesjalan');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function jarak()
    {
        return $this->belongsTo(Jarak::class, 'id_jarak');
    }

    public function harga()
    {
        return $this->belongsTo(Harga::class, 'id_harga');
    }

    public function keamanan()
    {
        return $this->belongsTo(Keamanan::class, 'id_keamanan');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
