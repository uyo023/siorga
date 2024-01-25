<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'npm' => '1221161014',
            'nama' => 'Mono',
            'fakultas' => 'Ilmu Komputer',
            'jurusan' => 'Sistem Informasi',
            'kelas' => 'Siang',
            'alamat' => 'Banten Indah Permai Blok F 10 No 1'

        ]);
        DB::table('mahasiswa')->insert([
            'npm' => '1221161015',
            'nama' => 'Miring',
            'fakultas' => 'Ilmu Komputer',
            'jurusan' => 'Sistem Informasi',
            'kelas' => 'Siang',
            'alamat' => 'Banten Indah Permai Blok F 10 No 1'

        ]);
    }
   
}
