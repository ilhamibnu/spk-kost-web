<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AksesJalan;
use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Keamanan;
use App\Models\Kriteria;
use App\Models\Lokasi;
use App\Models\User;
use App\Models\Role;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'User',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminajaya'),
            'id_role' => 1,
        ]);

        Kriteria::create([
            'name' => 'Jarak',
            'kepentingan' => 4,
            'jenis' => 'Cost'
        ]);

        Kriteria::create([
            'name' => 'Fasilitas',
            'kepentingan' => 1,
            'jenis' => 'Benefit'
        ]);

        Kriteria::create([
            'name' => 'Harga',
            'kepentingan' => 5,
            'jenis' => 'Cost'
        ]);

        Kriteria::create([
            'name' => 'Lokasi',
            'kepentingan' => 2,
            'jenis' => 'Benefit'
        ]);

        Kriteria::create([
            'name' => 'Keamanan',
            'kepentingan' => 2,
            'jenis' => 'Benefit'
        ]);

        Kriteria::create([
            'name' => 'Akses Jalan',
            'kepentingan' => 2,
            'jenis' => 'Benefit'
        ]);

        Jarak::create([
            'name' => 'Jauh (>10 km)',
            'bobot' => 5,
        ]);

        Jarak::create([
            'name' => 'Sedang (3-5 km)',
            'bobot' => 3,
        ]);

        Jarak::create([
            'name' => 'Dekat (<3 km)',
            'bobot' => 1,
        ]);

        Fasilitas::create([
            'name' => 'Lengkap ( AC, TV, km dalam)',
            'bobot' => 5,
        ]);

        Fasilitas::create([
            'name' => 'Menengah (km dalam, springbed)',
            'bobot' => 3,
        ]);

        Fasilitas::create([
            'name' => 'Dasar (wifi, km luar, meja, lemari)',
            'bobot' => 1,
        ]);

        Harga::create([
            'name' => 'Mahal (>750 ribu)',
            'bobot' => 5,
        ]);

        Harga::create([
            'name' => 'Sedang (450-750 ribu)',
            'bobot' => 3,
        ]);

        Harga::create([
            'name' => 'Murah (300-450 ribu)',
            'bobot' => 1,
        ]);

        Lokasi::create([
            'name' => 'Dekat (toko, laundry, Indomaret, Pom Bensin)',
            'bobot' => 5,
        ]);

        Lokasi::create([
            'name' => 'Sedang',
            'bobot' => 3,
        ]);

        Lokasi::create([
            'name' => 'Jauh',
            'bobot' => 1,
        ]);

        Keamanan::create([
            'name' => 'Ada Satpam',
            'bobot' => 5,
        ]);

        Keamanan::create([
            'name' => 'Ada CCTV',
            'bobot' => 3,
        ]);

        Keamanan::create([
            'name' => 'Tidak Ada',
            'bobot' => 1,
        ]);

        AksesJalan::create([
            'name' => 'Baik bisa dilalui mobil',
            'bobot' => 5,
        ]);

        AksesJalan::create([
            'name' => 'Jalan rusak',
            'bobot' => 3,
        ]);

        AksesJalan::create([
            'name' => 'Gang kecil/ sempit',
            'bobot' => 1,
        ]);
    }
}
