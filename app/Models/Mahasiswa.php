<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'fakultas',
        'ipk',
    ];

    protected $casts = [
        'ipk' => 'decimal:2',
    ];
}
