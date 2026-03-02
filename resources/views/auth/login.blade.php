@extends('layouts.app')

@section('title', 'Login - Perpustakaan')

@section('content')
<div class="auth-container">
    <div class="auth-card animate-fade-in">
        <div class="auth-header">
            <h1>Masuk</h1>
            <p>Selamat datang kembali di Perpustakaan</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                <span class="alert-icon">✅</span>
                {{ session('success') }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-info mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                    autofocus
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
                    placeholder="Masukkan password Anda"   
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex justify-between align-center">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember" id="remember">
                    <span>Ingat saya</span>
                </label>
                @if (Route::has('password.request'))       
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Masuk
            </button>
        </form>

        <div class="auth-footer">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
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
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
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

    .animate-fade-in {
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
