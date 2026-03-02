<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="app-container">
        <header class="app-header">
            <div class="header-left">
                <span class="logo">📚 Perpustakaan</span>
            </div>
            <div class="header-right">
                @auth
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-secondary">Register</a>
                @endauth
            </div>
        </header>

        <div class="app-body">
            @auth
            <aside class="app-sidebar">
                <nav class="sidebar-nav">
                    <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="nav-icon">📊</span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('mahasiswa.index') }}" class="nav-item {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                        <span class="nav-icon">👥</span>
                        <span>Mahasiswa</span>
                    </a>
                    <a href="{{ route('buku.index') }}" class="nav-item {{ request()->routeIs('buku.*') ? 'active' : '' }}">
                        <span class="nav-icon">📖</span>
                        <span>Buku</span>
                    </a>
                    <a href="{{ route('peminjaman.index') }}" class="nav-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                        <span class="nav-icon">📝</span>
                        <span>Peminjaman</span>
                    </a>
                    <a href="{{ route('kategori.index') }}" class="nav-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                        <span class="nav-icon">📚</span>
                        <span>Kategori</span>
                    </a>
                </nav>
            </aside>
            @endauth

            <main class="app-content">
                @yield('content')
            </main>
        </div>

        <footer class="app-footer">
            <span>Perpustakaan v1.0</span>
            <span class="separator">|</span>
            <span>VS Code Dark Theme</span>
        </footer>
    </div>

    <style>
        .app-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 48px;
            background-color: var(--vscode-activity-bar);
            border-bottom: 1px solid var(--vscode-border);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .header-left .logo {
            font-size: 15px;
            font-weight: 600;
            color: var(--vscode-text-primary);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            color: var(--vscode-text-secondary);
            font-size: 13px;
        }

        .app-body {
            display: flex;
            flex: 1;
            margin-top: 48px;
            min-height: calc(100vh - 72px);
        }

        .app-sidebar {
            width: 220px;
            background-color: var(--vscode-bg-secondary);
            border-right: 1px solid var(--vscode-border);
            position: fixed;
            top: 48px;
            bottom: 24px;
            left: 0;
            overflow-y: auto;
            padding: 12px 0;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            color: var(--vscode-text-primary);
            font-size: 13px;
            transition: all 0.15s ease;
            border-left: 3px solid transparent;
        }

        .nav-item:hover {
            background-color: var(--vscode-bg-hover);
        }

        .nav-item.active {
            background-color: var(--vscode-bg-active);
            border-left-color: var(--vscode-accent);
            color: #ffffff;
        }

        .nav-icon {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .app-content {
            flex: 1;
            margin-left: 220px;
            padding: 24px;
            background-color: var(--vscode-bg-primary);
        }

        .app-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            height: 24px;
            background-color: var(--vscode-bg-secondary);
            border-top: 1px solid var(--vscode-border);
            font-size: 11px;
            color: var(--vscode-text-muted);
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .separator {
            margin: 0 8px;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .app-sidebar {
                width: 60px;
            }
            
            .nav-item span:not(.nav-icon) {
                display: none;
            }
            
            .app-content {
                margin-left: 60px;
            }
        }
    </style>
</body>
</html>
