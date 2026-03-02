<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama' => 'Fiksi', 'deskripsi' => 'Buku cerita fiksi'],
            ['nama' => 'Non-Fiksi', 'deskripsi' => 'Buku informasi nyata'],
            ['nama' => 'Pendidikan', 'deskripsi' => 'Buku pelajaran dan akademis'],
            ['nama' => 'Sains', 'deskripsi' => 'Buku tentang ilmu pengetahuan'],
            ['nama' => 'Sejarah', 'deskripsi' => 'Buku tentang sejarah'],
            ['nama' => 'Teknologi', 'deskripsi' => 'Buku tentang teknologi'],
            ['nama' => 'Seni', 'deskripsi' => 'Buku tentang seni dan budaya'],
            ['nama' => 'Agama', 'deskripsi' => 'Buku tentang agama'],
        ];

        DB::table('kategoris')->insert($kategoris);
    }
}
