{{-- ============================================================ --}}
{{-- File: resources/views/admin/settings.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Pengaturan Situs')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf @method('PUT')

    <div class="card" style="max-width:600px">
        <div class="card-header">Pengaturan Umum</div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Judul Website</label>
                <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $settings['site_title'] ?? '') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Meta Description (SEO)</label>
                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Teks Footer</label>
                <input type="text" name="footer_text" class="form-control" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}">
            </div>
            <button type="submit" class="btn btn-gold">💾 Simpan Pengaturan</button>
        </div>
    </div>
</form>
@endsection