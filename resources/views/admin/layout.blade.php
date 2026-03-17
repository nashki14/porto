<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0a0a0a;
            --surface: #111111;
            --surface2: #161616;
            --border: rgba(255,255,255,0.07);
            --text: #e8e8e3;
            --muted: rgba(232,232,227,0.45);
            --gold: #c9a84c;
            --gold-bg: rgba(201,168,76,0.1);
            --red: #ef4444;
            --green: #22c55e;
            --sidebar-w: 240px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 50;
        }

        .sidebar-logo {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: -0.02em;
        }

        .sidebar-logo span { color: var(--gold); }

        .sidebar-nav {
            flex: 1;
            padding: 12px 0;
            overflow-y: auto;
        }

        .nav-section {
            padding: 16px 20px 6px;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(232,232,227,0.25);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 2px solid transparent;
        }

        .nav-item:hover {
            color: var(--text);
            background: rgba(255,255,255,0.03);
        }

        .nav-item.active {
            color: var(--gold);
            background: var(--gold-bg);
            border-left-color: var(--gold);
        }

        .nav-item .icon { font-size: 1rem; width: 18px; text-align: center; }

        .badge {
            margin-left: auto;
            background: var(--red);
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 100px;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 32px; height: 32px;
            background: var(--gold-bg);
            border: 1px solid rgba(201,168,76,0.3);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 700; color: var(--gold);
        }

        .user-name { font-size: 0.825rem; font-weight: 600; }
        .user-role { font-size: 0.7rem; color: var(--muted); }

        .logout-btn {
            margin-left: auto;
            color: var(--muted);
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.2s;
        }

        .logout-btn:hover { color: var(--red); }

        /* MAIN */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            padding: 16px 32px;
            border-bottom: 1px solid var(--border);
            background: var(--surface);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 40;
        }

        .page-title {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .topbar-right {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            border: none;
        }

        .btn-gold {
            background: var(--gold);
            color: #000;
        }

        .btn-gold:hover { opacity: 0.9; transform: translateY(-1px); }

        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover { color: var(--text); background: rgba(255,255,255,0.04); }

        .btn-danger {
            background: rgba(239,68,68,0.1);
            color: var(--red);
            border: 1px solid rgba(239,68,68,0.2);
        }

        .btn-danger:hover { background: rgba(239,68,68,0.2); }

        .content {
            padding: 32px;
            flex: 1;
        }

        /* CARDS */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-body { padding: 20px; }

        /* FORMS */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            color: var(--text);
            font-family: inherit;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus { border-color: var(--gold); }
        textarea.form-control { resize: vertical; min-height: 100px; }
        select.form-control option { background: var(--surface); }

        /* TABLE */
        table { width: 100%; border-collapse: collapse; }

        th {
            text-align: left;
            padding: 10px 16px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            font-size: 0.875rem;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255,255,255,0.02); }

        /* ALERTS */
        .alert {
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-success {
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.25);
            color: #4ade80;
        }

        .alert-error {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.25);
            color: #f87171;
        }

        /* GRID */
        .grid { display: grid; gap: 20px; }
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }

        /* STATS */
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
        }

        .stat-card-label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .stat-card-value {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text);
        }

        .stat-card-icon {
            font-size: 1.5rem;
            margin-bottom: 12px;
        }

        /* TAGS */
        .tag {
            display: inline-block;
            padding: 3px 8px;
            background: var(--gold-bg);
            border: 1px solid rgba(201,168,76,0.2);
            border-radius: 4px;
            font-size: 0.7rem;
            color: var(--gold);
            font-weight: 500;
        }

        /* CHECKBOX */
        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--gold);
        }

        /* RANGE */
        input[type="range"] {
            width: 100%;
            accent-color: var(--gold);
        }

        .view-site-link {
            background: var(--gold-bg);
            color: var(--gold);
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .view-site-link:hover { opacity: 0.8; }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { margin-left: 0; }
            .content { padding: 20px; }
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">Admin<span>.</span></div>
    <nav class="sidebar-nav">
        <div class="nav-section">Menu</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="icon">📊</span> Dashboard
        </a>

        <div class="nav-section">Konten</div>
        <a href="{{ route('admin.hero') }}" class="nav-item {{ request()->routeIs('admin.hero*') ? 'active' : '' }}">
            <span class="icon">🏠</span> Hero Section
        </a>
        <a href="{{ route('admin.about') }}" class="nav-item {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
            <span class="icon">👤</span> About
        </a>
        <a href="{{ route('admin.skills') }}" class="nav-item {{ request()->routeIs('admin.skills*') ? 'active' : '' }}">
            <span class="icon">⚡</span> Skills
        </a>
        <a href="{{ route('admin.portfolios') }}" class="nav-item {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}">
            <span class="icon">🚀</span> Portfolio
        </a>

        <div class="nav-section">Lainnya</div>
        <a href="{{ route('admin.messages') }}" class="nav-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
            <span class="icon">✉️</span> Pesan
            @php $unread = \App\Models\ContactMessage::where('is_read',false)->count(); @endphp
            @if($unread > 0) <span class="badge">{{ $unread }}</span> @endif
        </a>
        <a href="{{ route('admin.settings') }}" class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <span class="icon">⚙️</span> Pengaturan
        </a>
    </nav>
    <div class="sidebar-footer">
        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
        <div>
            <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="user-role">Administrator</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn" title="Logout" style="background:none;border:none;cursor:pointer;font-size:1rem;">🚪</button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <div class="topbar">
        <h1 class="page-title">@yield('title', 'Dashboard')</h1>
        <div class="topbar-right">
            <a href="{{ route('home') }}" target="_blank" class="view-site-link">↗ Lihat Website</a>
            @yield('topbar-actions')
        </div>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">⚠ {{ $errors->first() }}</div>
        @endif

        @yield('content')
    </div>
</main>

</body>
</html>
