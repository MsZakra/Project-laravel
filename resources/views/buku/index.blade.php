@extends('layouts.app')

@section('title', 'Data Buku - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-4">
    <div>
        <h1 class="page-title">Data Buku</h1>
        <p class="page-subtitle">Kelola data buku perpustakaan</p>
    </div>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        + Tambah Buku
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>ISBN</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bukus as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td><span class="isbn-badge">{{ $buku->isbn }}</span></td>
                    <td>
                        <span class="stok-badge @if($buku->stok > 5) stok-ada @elseif($buku->stok > 0) stok-terbatas @else stok-habis @endif">
                            {{ $buku->stok }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-secondary">👁️</a>
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-secondary">✏️</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data buku</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-container mt-4">
    {{ $bukus->links() }}
</div>

<style>
    .isbn-badge { font-family: var(--font-mono); font-size: 11px; background: var(--vscode-bg-tertiary); padding: 2px 6px; border-radius: 3px; }
    .stok-badge { font-weight: 600; padding: 2px 8px; border-radius: 3px; font-size: 12px; }
    .stok-ada { background: rgba(78, 201, 176, 0.2); color: var(--vscode-success); }
    .stok-terbatas { background: rgba(220, 220, 170, 0.2); color: var(--vscode-warning); }
    .stok-habis { background: rgba(241, 76, 76, 0.2); color: var(--vscode-error); }
    .action-buttons { display: flex; gap: 6px; }
</style>
@endsection
