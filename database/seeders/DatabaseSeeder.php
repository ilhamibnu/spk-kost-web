<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AksesJalan;
use App\Models\Alternatif;
use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Keamanan;
use App\Models\Kost;
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
            'password' => bcrypt('admin'),
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

        Kost::create([
            'name' => 'Kost Pak Ilham',
            'price' => 500000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost1.jpg',
            'jenis_kost' => 'Putra',
            'id_jarak' => 3,
            'id_fasilitas' => 2,
            'id_harga' => 1,
            'id_lokasi' => 3,
            'id_keamanan' => 3,
            'id_aksesjalan' => 2,
        ]);

        Alternatif::create([
            'id_kost' => 1,
            'id_jarak' => 3,
            'id_fasilitas' => 2,
            'id_harga' => 1,
            'id_lokasi' => 3,
            'id_keamanan' => 3,
            'id_aksesjalan' => 2,
        ]);

        Kost::create([
            'name' => 'Kost Pak Sugeng',
            'price' => 750000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost2.jpg',
            'jenis_kost' => 'Putra',
            'id_jarak' => 1,
            'id_fasilitas' => 1,
            'id_harga' => 1,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 3,
        ]);

        Alternatif::create([
            'id_kost' => 2,
            'id_jarak' => 1,
            'id_fasilitas' => 1,
            'id_harga' => 1,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 3,
        ]);

        Kost::create([
            'name' => 'Kost Pak Akbar',
            'price' => 450000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost3.jpg',
            'jenis_kost' => 'Putra',
            'id_jarak' => 2,
            'id_fasilitas' => 2,
            'id_harga' => 2,
            'id_lokasi' => 3,
            'id_keamanan' => 1,
            'id_aksesjalan' => 1,
        ]);

        Alternatif::create([
            'id_kost' => 3,
            'id_jarak' => 2,
            'id_fasilitas' => 2,
            'id_harga' => 2,
            'id_lokasi' => 3,
            'id_keamanan' => 1,
            'id_aksesjalan' => 1,
        ]);

        Kost::create([
            'name' => 'Kost Pak Arya',
            'price' => 300000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost4.jpg',
            'jenis_kost' => 'Putra',
            'id_jarak' => 3,
            'id_fasilitas' => 1,
            'id_harga' => 2,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 2,
        ]);

        Alternatif::create([
            'id_kost' => 4,
            'id_jarak' => 3,
            'id_fasilitas' => 1,
            'id_harga' => 2,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 2,
        ]);

        Kost::create([
            'name' => 'Kost Pak Rijal',
            'price' => 450000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost5.jpg',
            'jenis_kost' => 'Putra',
            'id_jarak' => 2,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 1,
            'id_keamanan' => 2,
            'id_aksesjalan' => 3,
        ]);

        Alternatif::create([
            'id_kost' => 5,
            'id_jarak' => 2,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 1,
            'id_keamanan' => 2,
            'id_aksesjalan' => 3,
        ]);

        Kost::create([
            'name' => 'Kost Pak Daffa',
            'price' => 300000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost6.jpg',
            'jenis_kost' => 'Putri',
            'id_jarak' => 1,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 2,
        ]);

        Alternatif::create([
            'id_kost' => 6,
            'id_jarak' => 1,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 2,
        ]);

        Kost::create([
            'name' => 'Kost Pak Riski',
            'price' => 450000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost7.jpg',
            'jenis_kost' => 'Putri',
            'id_jarak' => 2,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 1,
            'id_keamanan' => 1,
            'id_aksesjalan' => 3,
        ]);

        Alternatif::create([
            'id_kost' => 7,
            'id_jarak' => 2,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 1,
            'id_keamanan' => 1,
            'id_aksesjalan' => 3,
        ]);

        Kost::create([
            'name' => 'Kost Pak Rio',
            'price' => 300000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost8.jpg',
            'jenis_kost' => 'Putri',
            'id_jarak' => 1,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 1,
        ]);

        Alternatif::create([
            'id_kost' => 8,
            'id_jarak' => 1,
            'id_fasilitas' => 3,
            'id_harga' => 3,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 1,
        ]);

        Kost::create([
            'name' => 'Kost Pak Gigas',
            'price' => 450000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost9.jpg',
            'jenis_kost' => 'Putri',
            'id_jarak' => 1,
            'id_fasilitas' => 1,
            'id_harga' => 2,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 3,
        ]);

        Alternatif::create([
            'id_kost' => 9,
            'id_jarak' => 1,
            'id_fasilitas' => 1,
            'id_harga' => 2,
            'id_lokasi' => 2,
            'id_keamanan' => 3,
            'id_aksesjalan' => 3,
        ]);

        Kost::create([
            'name' => 'Kost Pak Lana',
            'price' => 300000,
            'alamat' => 'Jl. Raya Kedungwuni',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4456889242047!2d113.72270227589124!3d-8.157770731729773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6ea0e8375%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sen!2sid!4v1705718643681!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'deskripsi' => 'Kost ini sangat nyaman dan aman',
            'no_pemilik' => '08123456789',
            'foto' => 'kost10.jpg',
            'jenis_kost' => 'Putri',
            'id_jarak' => 1,
            'id_fasilitas' => 2,
            'id_harga' => 1,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 1,
        ]);

        Alternatif::create([
            'id_kost' => 10,
            'id_jarak' => 1,
            'id_fasilitas' => 2,
            'id_harga' => 1,
            'id_lokasi' => 2,
            'id_keamanan' => 2,
            'id_aksesjalan' => 1,
        ]);
    }
}
