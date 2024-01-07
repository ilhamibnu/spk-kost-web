<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'tb_alternatif';

    protected $fillable = [
        'id_kost',
        'id_aksesjalan',
        'id_fasilitas',
        'id_keamanan',
        'id_harga',
        'id_jarak',
        'id_lokasi'
    ];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost');
    }

    public function aksesjalan()
    {
        return $this->belongsTo(AksesJalan::class, 'id_aksesjalan');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function keamanan()
    {
        return $this->belongsTo(Keamanan::class, 'id_keamanan');
    }

    public function harga()
    {
        return $this->belongsTo(Harga::class, 'id_harga');
    }

    public function jarak()
    {
        return $this->belongsTo(Jarak::class, 'id_jarak');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
