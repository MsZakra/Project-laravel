<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = [
            ['nis' => '12345', 'nama' => 'Ahmad Fauzi', 'kelas' => 'X IPA 1', 'jurusan' => 'IPA', 'tanggal_lahir' => '2008-05-15', 'alamat' => 'Jl. Merdeka No. 10', 'no_telepon' => '081234567890'],
            ['nis' => '12346', 'nama' => 'Siti Aminah', 'kelas' => 'X IPS 1', 'jurusan' => 'IPS', 'tanggal_lahir' => '2008-08-20', 'alamat' => 'Jl. Sudirman No. 25', 'no_telepon' => '081234567891'],
            ['nis' => '12347', 'nama' => 'Budi Santoso', 'kelas' => 'XI IPA 1', 'jurusan' => 'IPA', 'tanggal_lahir' => '2007-03-10', 'alamat' => 'Jl. Asia Afrika No. 5', 'no_telepon' => '081234567892'],
            ['nis' => '12348', 'nama' => 'Dewi Lestari', 'kelas' => 'XI IPS 2', 'jurusan' => 'IPS', 'tanggal_lahir' => '2007-11-25', 'alamat' => 'Jl. Gatot Subroto No. 15', 'no_telepon' => '081234567893'],
            ['nis' => '12349', 'nama' => 'Rudi Hermawan', 'kelas' => 'XII IPA 1', 'jurusan' => 'IPA', 'tanggal_lahir' => '2006-07-08', 'alamat' => 'Jl. Dago No. 30', 'no_telepon' => '081234567894'],
            ['nis' => '12350', 'nama' => 'Nia Fatmawati', 'kelas' => 'XII IPS 1', 'jurusan' => 'IPS', 'tanggal_lahir' => '2006-12-01', 'alamat' => 'Jl. Braga No. 8', 'no_telepon' => '081234567895'],
        ];

        DB::table('siswas')->insert($siswas);
    }
}
