<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
