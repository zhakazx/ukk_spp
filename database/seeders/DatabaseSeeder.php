<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama_petugas' => 'Administrator Terkuat',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin',
        ]);
        \App\Models\User::create([
            'nama_petugas' => 'Budak admin',
            'username' => 'petugas',
            'password' => bcrypt('petugas'),
            'level' => 'petugas',
        ]);

        \App\Models\Kelas::create([
            'nama_kelas' => 'XII RPL 1',
            'kompetensi_keahlian' => 'RPL',          
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'XII RPL 2',
            'kompetensi_keahlian' => 'RPL',   
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'XII TKJ',
            'kompetensi_keahlian' => 'TKJ',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'XII MMK',
            'kompetensi_keahlian' => 'MMK',
        ]);

        \App\Models\Spp::create([
            'tahun' => 2020,
            'nominal' => 200000,
        ]);
        \App\Models\Spp::create([
            'tahun' => 2021,
            'nominal' => 250000,
        ]);
        \App\Models\Spp::create([
            'tahun' => 2022,
            'nominal' => 300000,
        ]);
    }
}
