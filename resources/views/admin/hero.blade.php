{{-- ============================================================ --}}
{{-- File: resources/views/admin/hero.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Hero Section')

@section('content')
<form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="grid grid-2" style="gap:24px">
        <div>
            <div class="card">
                <div class="card-header">Informasi Utama</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $hero->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tagline / Jabatan</label>
                        <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $hero->tagline) }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $hero->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top:20px">
                <div class="card-header">Social Media</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">GitHub URL</label>
                        <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $hero->github_url) }}" placeholder="https://github.com/username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $hero->linkedin_url) }}" placeholder="https://linkedin.com/in/username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $hero->instagram_url) }}" placeholder="https://instagram.com/username">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card">
                <div class="card-header">Foto Profil</div>
                <div class="card-body">
                    @if($hero->profile_photo)
                        <img src="{{ asset('storage/'.$hero->profile_photo) }}" alt="Profile" style="width:100%;max-width:200px;border-radius:12px;margin-bottom:12px;display:block">
                    @endif
                    <div class="form-group">
                        <label class="form-label">Upload Foto (JPG/PNG, max 2MB)</label>
                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top:20px">
                <div class="card-header">File CV</div>
                <div class="card-body">
                    @if($hero->cv_file)
                        <div style="margin-bottom:12px">
                            <a href="{{ asset('storage/'.$hero->cv_file) }}" target="_blank" style="color:var(--gold);font-size:0.8rem">📄 CV sudah diupload - Lihat File</a>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="form-label">Upload CV (PDF)</label>
                        <input type="file" name="cv_file" class="form-control" accept=".pdf">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:24px">
        <button type="submit" class="btn btn-gold">💾 Simpan Perubahan</button>
    </div>
</form>
@endsection