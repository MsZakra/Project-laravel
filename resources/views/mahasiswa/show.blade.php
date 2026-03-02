@extends('layouts.app')

@section('title', 'Detail Mahasiswa - Perpustakaan')

@section('content')
<div class="page-header d-flex justify-between align-center mb-4">
    <div>
        <h1 class="page-title">Detail Mahasiswa</h1>
        <p class="page-subtitle">Informasi lengkap mahasiswa</p>
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>
</div>

<div class="detail-container">
    <div class="detail-grid">
        <div class="detail-item">
            <span class="detail-label">NIM</span>
            <span class="detail-value">{{ $mahasiswa->nim }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Nama Lengkap</span>
            <span class="detail-value">{{ $mahasiswa->nama }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Jurusan</span>
            <span class="detail-value">{{ $mahasiswa->jurusan }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Fakultas</span>
            <span class="detail-value">{{ $mahasiswa->fakultas }}</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">IPK</span>
            <span class="detail-value ipk-value @if($mahasiswa->ipk >= 3.5) ipk-high @elseif($mahasiswa->ipk >= 3.0) ipk-medium @else ipk-low @endif">
                {{ number_format($mahasiswa->ipk, 2) }}
            </span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Tanggal Dibuat</span>
            <span class="detail-value">{{ $mahasiswa->created_at->format('d M Y H:i') }}</span>
        </div>
    </div>

    <div class="detail-actions">
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary">
            ✏️ Edit
        </a>
        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                🗑️ Hapus
            </button>
        </form>
    </div>
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

    .detail-container {
        max-width: 600px;
        background-color: var(--vscode-bg-secondary);
        border: 1px solid var(--vscode-border);
        border-radius: 6px;
        padding: 24px;
    }

    .detail-grid {
        display: grid;
        gap: 16px;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--vscode-border);
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: var(--vscode-text-muted);
        font-size: 13px;
    }

    .detail-value {
        color: var(--vscode-text-primary);
        font-weight: 500;
        font-size: 14px;
    }

    .ipk-value {
        padding: 4px 12px;
        border-radius: 4px;
        font-weight: 600;
    }

    .ipk-high {
        background-color: rgba(78, 201, 176, 0.2);
        color: var(--vscode-success);
    }

    .ipk-medium {
        background-color: rgba(220, 220, 170, 0.2);
        color: var(--vscode-warning);
    }

    .ipk-low {
        background-color: rgba(241, 76, 76, 0.2);
        color: var(--vscode-error);
    }

    .detail-actions {
        display: flex;
        gap: 12px;
        margin-top: 24px;
        padding-top: 16px;
        border-top: 1px solid var(--vscode-border);
    }
</style>
@endsection
