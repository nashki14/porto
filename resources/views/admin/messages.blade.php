{{-- ============================================================ --}}
{{-- File: resources/views/admin/messages.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Pesan Masuk')

@section('content')
<div class="card">
    <div class="card-header">Semua Pesan ({{ $messages->total() }})</div>
    <div style="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th>Pengirim</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr style="{{ !$msg->is_read ? 'background:rgba(201,168,76,0.03)' : '' }}">
                        <td>
                            <div style="font-weight:{{ !$msg->is_read ? '600' : '400' }}">{{ $msg->name }}</div>
                            <div style="color:var(--muted);font-size:0.775rem">{{ $msg->email }}</div>
                        </td>
                        <td style="color:var(--muted)">{{ $msg->subject ?: '—' }}</td>
                        <td style="color:var(--muted);font-size:0.8rem">{{ $msg->created_at->format('d M Y') }}</td>
                        <td>
                            <span style="font-size:0.75rem;font-weight:600;color:{{ $msg->is_read ? 'var(--muted)' : 'var(--gold)' }}">
                                {{ $msg->is_read ? 'Dibaca' : '● Baru' }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex;gap:8px">
                                <a href="{{ route('admin.messages.read', $msg) }}" class="btn btn-ghost" style="padding:4px 10px;font-size:0.75rem">Baca</a>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger" style="padding:4px 10px;font-size:0.75rem">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:32px">Tidak ada pesan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top:20px">{{ $messages->links() }}</div>
@endsection