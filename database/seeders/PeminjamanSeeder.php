<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $peminjamans = [
            ['siswa_id' => 1, 'buku_id' => 1, 'tanggal_pinjam' => '2024-01-10', 'tanggal_kembali' => '2024-01-20', 'tanggal_jatuh_tempo' => '2024-01-17', 'status' => 'dikembalikan'],
            ['siswa_id' => 2, 'buku_id' => 3, 'tanggal_pinjam' => '2024-01-12', 'tanggal_kembali' => '2024-01-22', 'tanggal_jatuh_tempo' => '2024-01-19', 'status' => 'dikembalikan'],
            ['siswa_id' => 3, 'buku_id' => 2, 'tanggal_pinjam' => '2024-01-15', 'tanggal_kembali' => null, 'tanggal_jatuh_tempo' => '2024-01-22', 'status' => 'dipinjam'],
            ['siswa_id' => 4, 'buku_id' => 5, 'tanggal_pinjam' => '2024-01-18', 'tanggal_kembali' => '2024-01-28', 'tanggal_jatuh_tempo' => '2024-01-25', 'status' => 'dikembalikan'],
            ['siswa_id' => 5, 'buku_id' => 4, 'tanggal_pinjam' => '2024-01-20', 'tanggal_kembali' => null, 'tanggal_jatuh_tempo' => '2024-01-27', 'status' => 'terlambat'],
            ['siswa_id' => 1, 'buku_id' => 6, 'tanggal_pinjam' => '2024-01-22', 'tanggal_kembali' => '2024-01-30', 'tanggal_jatuh_tempo' => '2024-01-29', 'status' => 'dikembalikan'],
        ];

        DB::table('peminjamans')->insert($peminjamans);
    }
}
