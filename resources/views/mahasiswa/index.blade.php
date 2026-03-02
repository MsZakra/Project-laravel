@extends('layouts.app')

@section('title', 'Data Mahasiswa - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-5">
    <div>
        <h1 class="page-title">Data Mahasiswa</h1>
        <p class="page-subtitle">Kelola data mahasiswa perpustakaan dalam tampilan editor</p>
    </div>
    <div class="header-actions d-flex gap-3">
        <form action="{{ route('mahasiswa.index') }}" method="GET" class="search-form">
            <div class="search-container">
                <span class="search-icon">🔍</span>
                <input type="text" name="search" class="form-control search-input" placeholder="Cari mahasiswa..." value="{{ request('search') }}">
            </div>
        </form>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <span>+</span> Tambah Mahasiswa
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4 animate-fade-in">
        <span class="alert-icon">✅</span>
        {{ session('success') }}
    </div>
@endif

<div class="table-container shadow-sm">
    <table>
        <thead>
            <tr>
                <th width="50">No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th width="80">IPK</th>
                <th width="120" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <td class="text-muted">{{ ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() + $loop->iteration }}</td>        
                    <td>
                        <span class="nim-badge">{{ $mahasiswa->nim }}</span>
                    </td>
                    <td class="font-bold">{{ $mahasiswa->nama }}</td>        
                    <td>{{ $mahasiswa->jurusan }}</td>     
                    <td>{{ $mahasiswa->fakultas }}</td>    
                    <td>
                        <span class="ipk-badge @if($mahasiswa->ipk >= 3.5) ipk-high @elseif($mahasiswa->ipk >= 3.0) ipk-medium @else ipk-low @endif">
                            {{ number_format($mahasiswa->ipk, 2) }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons justify-center">       
                            <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn-icon btn-view" title="Lihat Detail">
                                👁️
                            </a>
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn-icon btn-edit" title="Edit Data">
                                📝
                            </a>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Hapus Data" onclick="return confirm('Apakah Anda yakin ingin menghapus data {{ $mahasiswa->nama }}?')">       
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">   
                        <div class="empty-state">
                            <div class="empty-icon">📂</div>
                            <p>Tidak ada data mahasiswa ditemukan</p>
                            @if(request('search'))
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm mt-3">Reset Pencarian</a>
                            @else
                                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm mt-3">
                                    Tambah Data Pertama        
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-container mt-5">
    {{ $mahasiswas->appends(request()->query())->links() }}
</div>

<style>
    .search-container {
        position: relative;
        width: 250px;
    }

    .search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        opacity: 0.6;
    }

    .search-input {
        padding-left: 32px !important;
        height: 34px;
        font-size: 13px;
        background-color: var(--vscode-bg-tertiary) !important;
    }

    .page-header {
        border-bottom: 1px solid var(--vscode-border);
        padding-bottom: 20px;
    }

    .page-title {
        font-size: 26px;
        color: #ffffff;
        font-weight: 500;
    }

    .font-bold { font-weight: 600; color: #ffffff; }

    .btn-icon {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 0.2s;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-view:hover { background-color: rgba(86, 156, 214, 0.2); }
    .btn-edit:hover { background-color: rgba(220, 220, 170, 0.2); }
    .btn-delete:hover { background-color: rgba(241, 76, 76, 0.2); }

    .justify-center { justify-content: center; }
    .inline-block { display: inline-block; }

    .empty-icon {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.3;
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alert-icon { margin-right: 8px; }

    .table-container {
        background-color: var(--vscode-bg-secondary);
        border-radius: 6px;
        overflow: hidden;
    }
</style>
@endsection
