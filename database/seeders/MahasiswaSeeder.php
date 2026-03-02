<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            ['nim' => '2021001', 'nama' => 'Ahmad Wijaya', 'jurusan' => 'Informatika', 'fakultas' => 'FTI', 'ipk' => 3.85],
            ['nim' => '2021002', 'nama' => 'Sari Dewi', 'jurusan' => 'Manajemen', 'fakultas' => 'FE', 'ipk' => 3.75],
            ['nim' => '2021003', 'nama' => 'Budi Pratama', 'jurusan' => 'Teknik Elektro', 'fakultas' => 'FT', 'ipk' => 3.60],
            ['nim' => '2021004', 'nama' => 'Rina Susilowati', 'jurusan' => 'Psikologi', 'fakultas' => 'FK', 'ipk' => 3.90],
            ['nim' => '2021005', 'nama' => 'Joko Widodo', 'jurusan' => 'Hukum', 'fakultas' => 'FH', 'ipk' => 3.45],
            ['nim' => '2022001', 'nama' => 'Diana Putri', 'jurusan' => 'Informatika', 'fakultas' => 'FTI', 'ipk' => 3.95],
            ['nim' => '2022002', 'nama' => 'Rendi Saputra', 'jurusan' => 'Akuntansi', 'fakultas' => 'FE', 'ipk' => 3.70],
            ['nim' => '2022003', 'nama' => 'Maya Kartika', 'jurusan' => 'Kedokteran', 'fakultas' => 'FK', 'ipk' => 3.80],
            ['nim' => '2023001', 'nama' => 'Fajar Nugraha', 'jurusan' => 'Informatika', 'fakultas' => 'FTI', 'ipk' => 3.55],
            ['nim' => '2023002', 'nama' => 'Lina Marlina', 'jurusan' => 'Manajemen', 'fakultas' => 'FE', 'ipk' => 3.65],
        ];

        DB::table('mahasiswas')->insert($mahasiswas);
    }
}
