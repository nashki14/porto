{{-- ============================================================ --}}
{{-- File: resources/views/admin/about.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'About Section')

@section('content')
<form action="{{ route('admin.about.update') }}" method="POST">
    @csrf @method('PUT')

    <div class="grid grid-2" style="gap:24px">
        <div class="card">
            <div class="card-header">Informasi About</div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Judul Section</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $about->title) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Bio / Deskripsi Diri</label>
                    <textarea name="bio" class="form-control" rows="6">{{ old('bio', $about->bio) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $about->location) }}" placeholder="Jakarta, Indonesia">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $about->email) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $about->phone) }}">
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Statistik</div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Tahun Pengalaman</label>
                    <input type="number" name="years_experience" class="form-control" value="{{ old('years_experience', $about->years_experience) }}" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Proyek Selesai</label>
                    <input type="number" name="projects_done" class="form-control" value="{{ old('projects_done', $about->projects_done) }}" min="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Jumlah Klien</label>
                    <input type="number" name="clients" class="form-control" value="{{ old('clients', $about->clients) }}" min="0">
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:24px">
        <button type="submit" class="btn btn-gold">💾 Simpan Perubahan</button>
    </div>
</form>
@endsection