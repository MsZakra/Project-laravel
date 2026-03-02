@extends('layouts.app')

@section('title', 'Tambah Mahasiswa - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-4">
    <div>
        <h1 class="page-title">Tambah Mahasiswa</h1>
        <p class="page-subtitle">Tambah data mahasiswa baru</p>
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>
</div>

<div class="form-container">
    <form method="POST" action="{{ route('mahasiswa.store') }}">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label for="nim" class="form-label">NIM</label>
                <input 
                    type="text" 
                    name="nim" 
                    id="nim" 
                    class="form-control @error('nim') is-invalid @enderror" 
                    value="{{ old('nim') }}" 
                    placeholder="Masukkan NIM"
                    required
                >
                @error('nim')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="nama" 
                    id="nama" 
                    class="form-control @error('nama') is-invalid @enderror" 
                    value="{{ old('nama') }}" 
                    placeholder="Masukkan nama lengkap"
                    required
                >
                @error('nama')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input 
                    type="text" 
                    name="jurusan" 
                    id="jurusan" 
                    class="form-control @error('jurusan') is-invalid @enderror" 
                    value="{{ old('jurusan') }}" 
                    placeholder="Masukkan Jurusan"
                    required
                >
                @error('jurusan')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input 
                    type="text" 
                    name="fakultas" 
                    id="fakultas" 
                    class="form-control @error('fakultas') is-invalid @enderror" 
                    value="{{ old('fakultas') }}" 
                    placeholder="Masukkan Fakultas"
                    required
                >
                @error('fakultas')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="ipk" class="form-label">IPK</label>
            <input 
                type="number" 
                name="ipk" 
                id="ipk" 
                class="form-control @error('ipk') is-invalid @enderror" 
                value="{{ old('ipk') }}" 
                placeholder="Masukkan IPK (0-4)"
                step="0.01"
                min="0"
                max="4"
                required
            >
            @error('ipk')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Simpan Data
            </button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

<style>
    .page-header {
        padding-bottom: 16px;
        border-bottom: 1px solid var(--vscode-border);
    }

    .page-title {
        font-size: 24px;
        font-weight: 600;
        color: var(--vscode-text-primary);
        margin-bottom: 4px;
    }

    .page-subtitle {
        font-size: 13px;
        color: var(--vscode-text-muted);
    }

    .form-container {
        max-width: 600px;
        background-color: var(--vscode-bg-secondary);
        border: 1px solid var(--vscode-border);
        border-radius: 6px;
        padding: 24px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 576px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    .form-group {
        margin-bottom: 16px;
    }

    .error-message {
        color: var(--vscode-error);
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }

    .is-invalid {
        border-color: var(--vscode-error) !important;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 24px;
        padding-top: 16px;
        border-top: 1px solid var(--vscode-border);
    }
</style>
@endsection
