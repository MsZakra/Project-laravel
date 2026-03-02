<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $bukus = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'penerbit' => 'Bentang Pustaka', 'tahun_terbit' => 2005, 'isbn' => '978-979-1227-07-9', 'stok' => 10, 'kategori_id' => 1],
            ['judul' => 'Atomic Habits', 'penulis' => 'James Clear', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2018, 'isbn' => '978-602-06-2947-1', 'stok' => 5, 'kategori_id' => 3],
            ['judul' => 'Sapiens', 'penulis' => 'Yuval Noah Harari', 'penerbit' => 'KPG', 'tahun_terbit' => 2011, 'isbn' => '978-979-91-0404-6', 'stok' => 7, 'kategori_id' => 5],
            ['judul' => 'Buku Pintar Coding', 'penulis' => 'John Doe', 'penerbit' => 'Elex Media', 'tahun_terbit' => 2020, 'isbn' => '978-602-00-1234-5', 'stok' => 8, 'kategori_id' => 6],
            ['judul' => 'Filsafat Ilmu', 'penulis' => 'Prof. Dr. H. M. Amin', 'penerbit' => 'UI Press', 'tahun_terbit' => 2015, 'isbn' => '978-979-42-7891-0', 'stok' => 3, 'kategori_id' => 3],
            ['judul' => 'Seni Memahami Orang', 'penulis' => 'David J. Lieberman', 'penerbit' => 'Gramedia', 'tahun_terbit' => 2007, 'isbn' => '978-979-22-3456-7', 'stok' => 6, 'kategori_id' => 2],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'penerbit' => 'Lentera Dipantara', 'tahun_terbit' => 1980, 'isbn' => '978-979-10-9001-1', 'stok' => 4, 'kategori_id' => 1],
            ['judul' => 'Pengantar Biologi', 'penulis' => 'Campbell', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2010, 'isbn' => '978-979-08-4567-8', 'stok' => 5, 'kategori_id' => 4],
        ];

        DB::table('bukus')->insert($bukus);
    }
}
