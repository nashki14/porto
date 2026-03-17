{{-- ============================================================ --}}
{{-- File: resources/views/admin/message-detail.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Detail Pesan')

@section('content')
<div class="card" style="max-width:640px">
    <div class="card-header">
        Pesan dari {{ $message->name }}
        <a href="{{ route('admin.messages') }}" style="font-size:0.75rem;color:var(--gold);text-decoration:none">← Kembali</a>
    </div>
    <div class="card-body">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px">
            <div>
                <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--muted);margin-bottom:4px">Pengirim</div>
                <div style="font-weight:600">{{ $message->name }}</div>
            </div>
            <div>
                <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--muted);margin-bottom:4px">Email</div>
                <div><a href="mailto:{{ $message->email }}" style="color:var(--gold)">{{ $message->email }}</a></div>
            </div>
            <div>
                <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--muted);margin-bottom:4px">Subjek</div>
                <div>{{ $message->subject ?: '—' }}</div>
            </div>
            <div>
                <div style="font-size:0.7rem;text-transform:uppercase;letter-spacing:0.08em;color:var(--muted);margin-bottom:4px">Tanggal</div>
                <div>{{ $message->created_at->format('d M Y H:i') }}</div>
            </div>
        </div>
        <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:20px;font-size:0.9rem;line-height:1.7;white-space:pre-wrap">{{ $message->message }}</div>
        <div style="margin-top:20px">
            <a href="mailto:{{ $message->email }}" class="btn btn-gold">↩ Balas via Email</a>
        </div>
    </div>
</div>
@endsection