{{-- ============================================================ --}}
{{-- File: resources/views/admin/portfolios.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Kelola Portfolio')

@section('topbar-actions')
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-gold">➕ Tambah Portfolio</a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">Semua Portfolio ({{ $portfolios->count() }})</div>
    <div style="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th>Proyek</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $p)
                    <tr>
                        <td>
                            <div style="font-weight:600">{{ $p->title }}</div>
                            <div style="color:var(--muted);font-size:0.775rem">{{ Str::limit($p->description, 60) }}</div>
                        </td>
                        <td><span class="tag">{{ $p->category }}</span></td>
                        <td>
                            <span style="color:{{ $p->is_active ? 'var(--green)' : 'var(--red)' }};font-size:0.8rem;font-weight:600">
                                {{ $p->is_active ? '● Aktif' : '○ Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            @if($p->is_featured)
                                <span style="color:var(--gold);font-size:0.8rem">★ Featured</span>
                            @else
                                <span style="color:var(--muted);font-size:0.8rem">—</span>
                            @endif
                        </td>
                        <td>
                            <div style="display:flex;gap:8px">
                                <a href="{{ route('admin.portfolios.edit', $p) }}" class="btn btn-ghost" style="padding:4px 10px;font-size:0.75rem">Edit</a>
                                <form action="{{ route('admin.portfolios.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus portfolio ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding:4px 10px;font-size:0.75rem">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:32px">Belum ada portfolio</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection