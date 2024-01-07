<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kriteria;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
    }
}
