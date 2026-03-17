{{-- ============================================================ --}}
{{-- File: resources/views/admin/portfolio-form.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', $portfolio->id ? 'Edit Portfolio' : 'Tambah Portfolio')

@section('content')
<form action="{{ $portfolio->id ? route('admin.portfolios.update', $portfolio) : route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($portfolio->id) @method('PUT') @endif

    <div class="grid grid-2" style="gap:24px">
        <div>
            <div class="card">
                <div class="card-header">Detail Proyek</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul Proyek *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $portfolio->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="category" class="form-control">
                            @foreach(['Web App', 'Website', 'Mobile', 'API', 'UI Design', 'Other'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $portfolio->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tech Stack (pisahkan dengan koma)</label>
                        <input type="text" name="tech_stack_input" class="form-control" placeholder="Laravel, Vue.js, MySQL" value="{{ old('tech_stack_input', is_array($portfolio->tech_stack) ? implode(', ', $portfolio->tech_stack) : '') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">URL Proyek (Live Demo)</label>
                        <input type="url" name="project_url" class="form-control" value="{{ old('project_url', $portfolio->project_url) }}" placeholder="https://...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">URL GitHub</label>
                        <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $portfolio->github_url) }}" placeholder="https://github.com/...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $portfolio->order ?? 0) }}" min="0">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card">
                <div class="card-header">Gambar & Pengaturan</div>
                <div class="card-body">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Portfolio" style="width:100%;border-radius:8px;margin-bottom:16px">
                    @endif
                    <div class="form-group">
                        <label class="form-label">Upload Gambar (JPG/PNG)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}>
                            <label for="is_featured" style="text-transform:none;letter-spacing:0;font-size:0.875rem;font-weight:500;color:var(--text)">Tampilkan sebagai Featured</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $portfolio->is_active ?? true) ? 'checked' : '' }}>
                            <label for="is_active" style="text-transform:none;letter-spacing:0;font-size:0.875rem;font-weight:500;color:var(--text)">Aktif / Tampilkan di Website</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:24px;display:flex;gap:12px">
        <button type="submit" class="btn btn-gold">💾 Simpan Portfolio</button>
        <a href="{{ route('admin.portfolios') }}" class="btn btn-ghost">← Kembali</a>
    </div>
</form>
@endsection