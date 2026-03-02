@extends('layouts.app')

@section('title', 'Selamat Datang - Perpustakaan')

@section('content')
<div class="welcome-container">
    <div class="welcome-content">
        <h1 class="welcome-title">Selamat Datang di Sistem Perpustakaan</h1>
        <p class="welcome-subtitle">Kelola data mahasiswa, buku, dan peminjaman dengan mudah</p>
        
        <div class="welcome-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    Buka Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        Daftar
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

<style>
    .welcome-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 144px);
        text-align: center;
    }

    .welcome-content {
        max-width: 500px;
    }

    .welcome-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--vscode-text-primary);
        margin-bottom: 12px;
    }

    .welcome-subtitle {
        font-size: 16px;
        color: var(--vscode-text-muted);
        margin-bottom: 32px;
    }

    .welcome-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .btn {
        padding: 12px 24px;
        font-size: 14px;
    }
</style>
@endsection
