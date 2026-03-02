@extends('layouts.app')

@section('title', 'Data Peminjaman - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-4">
    <div>
        <h1 class="page-title">Data Peminjaman</h1>
        <p class="page-subtitle">Kelola peminjaman buku</p>
    </div>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
        + Tambah Peminjaman
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-error mb-4">{{ session('error') }}</div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->siswa->nama }}</td>
                    <td>{{ $peminjaman->buku->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d/m/Y') }}</td>
                    <td>{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d/m/Y') : '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge @if($peminjaman->status == 'dikembalikan') badge-success @elseif($peminjaman->status == 'terlambat') badge-danger @else badge-warning @endif">
                            {{ $peminjaman->status }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-secondary">✏️</a>
                            <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data peminjaman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-container mt-4">
    {{ $peminjamans->links() }}
</div>

<style>
    .action-buttons { display: flex; gap: 6px; }
</style>
@endsection
