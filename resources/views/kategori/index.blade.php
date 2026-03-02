@extends('layouts.app')

@section('title', 'Data Kategori - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-4">
    <div>
        <h1 class="page-title">Data Kategori</h1>
        <p class="page-subtitle">Kelola kategori buku</p>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>{{ $kategori->deskripsi ?? '-' }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-secondary">✏️</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-container mt-4">
    {{ $kategoris->links() }}
</div>

<style>
    .action-buttons { display: flex; gap: 6px; }
</style>
@endsection
