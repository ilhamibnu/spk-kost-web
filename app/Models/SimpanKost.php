<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanKost extends Model
{
    use HasFactory;

    protected $table = 'tb_simpankost';

    protected $fillable = [
        'id_user',
        'id_kost',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'id_kost', 'id');
    }
}
