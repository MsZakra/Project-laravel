@extends('layouts.app')

@section('title', 'Dashboard - Perpustakaan')

@section('content')
<div class="dashboard-container">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Selamat datang di sistem perpustakaan</p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-content">
                <span class="stat-number">{{ \App\Models\Mahasiswa::count() }}</span>
                <span class="stat-label">Mahasiswa</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📖</div>
            <div class="stat-content">
                <span class="stat-number">{{ \App\Models\Buku::count() ?? 0 }}</span>
                <span class="stat-label">Buku</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📝</div>
            <div class="stat-content">
                <span class="stat-number">{{ \App\Models\Peminjaman::count() ?? 0 }}</span>
                <span class="stat-label">Peminjaman</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📚</div>
            <div class="stat-content">
                <span class="stat-number">{{ \App\Models\Kategori::count() ?? 0 }}</span>
                <span class="stat-label">Kategori</span>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        padding: 0;
    }

    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: var(--vscode-text-muted);
        font-size: 13px;
        margin-bottom: 24px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin-top: 20px;
    }

    .stat-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px;
        background-color: var(--vscode-bg-secondary);
        border: 1px solid var(--vscode-border);
        border-radius: 6px;
    }

    .stat-icon {
        font-size: 32px;
    }

    .stat-content {
        display: flex;
        flex-direction: column;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 700;
        color: var(--vscode-text-primary);
    }

    .stat-label {
        font-size: 13px;
        color: var(--vscode-text-muted);
    }
</style>
@endsection
