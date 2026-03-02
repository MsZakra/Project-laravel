@extends('layouts.app')

@section('title', 'Register - Perpustakaan')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1>Daftar</h1>
            <p>Buat akun baru untuk Perpustakaan</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" 
                    placeholder="Masukkan nama lengkap Anda"
                    required 
                    autofocus
                >
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" 
                    placeholder="Masukkan email Anda"
                    required
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    placeholder="Masukkan password (min. 8 karakter)"
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirmation" class="form-label">Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password-confirmation" 
                    class="form-control" 
                    placeholder="Masukkan ulang password Anda"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Daftar
            </button>
        </form>

        <div class="auth-footer">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a></p>
        </div>
    </div>
</div>

<style>
    .auth-container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 72px);
        padding: 20px;
    }

    .auth-card {
        width: 100%;
        max-width: 400px;
        background-color: var(--vscode-bg-secondary);
        border: 1px solid var(--vscode-border);
        border-radius: 6px;
        padding: 32px;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 28px;
    }

    .auth-header h1 {
        font-size: 24px;
        font-weight: 600;
        color: var(--vscode-text-primary);
        margin-bottom: 8px;
    }

    .auth-header p {
        color: var(--vscode-text-muted);
        font-size: 13px;
    }

    .btn-block {
        width: 100%;
        padding: 10px 16px;
        margin-top: 8px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--vscode-text-muted);
        font-size: 13px;
        cursor: pointer;
    }

    .checkbox-label input {
        accent-color: var(--vscode-accent);
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

    .auth-footer {
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--vscode-border);
        font-size: 13px;
    }

    .auth-footer p {
        color: var(--vscode-text-muted);
    }
</style>
@endsection
