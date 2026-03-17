@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<div class="grid grid-4" style="margin-bottom:28px">
    <div class="stat-card">
        <div class="stat-card-icon">🚀</div>
        <div class="stat-card-label">Total Portfolio</div>
        <div class="stat-card-value">{{ $stats['portfolios'] }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-icon">⚡</div>
        <div class="stat-card-label">Total Skills</div>
        <div class="stat-card-value">{{ $stats['skills'] }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-icon">✉️</div>
        <div class="stat-card-label">Total Pesan</div>
        <div class="stat-card-value">{{ $stats['messages'] }}</div>
    </div>
    <div class="stat-card" style="border-color:rgba(201,168,76,0.25); background: rgba(201,168,76,0.06)">
        <div class="stat-card-icon">🔔</div>
        <div class="stat-card-label">Pesan Belum Dibaca</div>
        <div class="stat-card-value" style="color:var(--gold)">{{ $stats['unread'] }}</div>
    </div>
</div>

<div class="grid grid-2">
    <!-- Quick Actions -->
    <div class="card">
        <div class="card-header">Aksi Cepat</div>
        <div class="card-body" style="display:flex;flex-direction:column;gap:10px">
            <a href="{{ route('admin.hero') }}" class="btn btn-ghost" style="justify-content:flex-start">🏠 Edit Hero Section</a>
            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-ghost" style="justify-content:flex-start">➕ Tambah Portfolio</a>
            <a href="{{ route('admin.skills') }}" class="btn btn-ghost" style="justify-content:flex-start">⚡ Kelola Skills</a>
            <a href="{{ route('admin.messages') }}" class="btn btn-ghost" style="justify-content:flex-start">✉️ Lihat Pesan</a>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="card">
        <div class="card-header">
            Pesan Terbaru
            <a href="{{ route('admin.messages') }}" style="font-size:0.75rem;color:var(--gold);text-decoration:none">Lihat Semua →</a>
        </div>
        <div class="card-body" style="padding:0">
            @forelse($recentMessages as $msg)
                <div style="padding:14px 20px; border-bottom:1px solid var(--border); display:flex; justify-content:space-between; align-items:center">
                    <div>
                        <div style="font-weight:600; font-size:0.875rem; display:flex; align-items:center; gap:6px">
                            {{ $msg->name }}
                            @if(!$msg->is_read) <span style="width:6px;height:6px;background:var(--gold);border-radius:50%;display:inline-block"></span> @endif
                        </div>
                        <div style="color:var(--muted);font-size:0.775rem">{{ Str::limit($msg->message, 50) }}</div>
                    </div>
                    <div style="font-size:0.7rem;color:var(--muted)">{{ $msg->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <div style="padding:20px;text-align:center;color:var(--muted)">Belum ada pesan</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
