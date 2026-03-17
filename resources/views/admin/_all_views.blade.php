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


{{-- ============================================================ --}}
{{-- File: resources/views/admin/skills.blade.php --}}
{{-- ============================================================ --}}
@extends('admin.layout')
@section('title', 'Kelola Skills')

@section('content')
<div class="grid grid-2" style="gap:24px; align-items:start">
    <!-- Add Skill Form -->
    <div class="card">
        <div class="card-header">Tambah Skill Baru</div>
        <div class="card-body">
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Skill</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Laravel" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="category" class="form-control">
                        <option value="Frontend">Frontend</option>
                        <option value="Backend">Backend</option>
                        <option value="Tools">Tools</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Database">Database</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Level Keahlian: <span id="level-val">80</span>%</label>
                    <input type="range" name="level" min="0" max="100" value="80" oninput="document.getElementById('level-val').textContent=this.value">
                </div>
                <div class="form-group">
                    <label class="form-label">Urutan Tampilan</label>
                    <input type="number" name="order" class="form-control" value="0" min="0">
                </div>
                <button type="submit" class="btn btn-gold">➕ Tambah Skill</button>
            </form>
        </div>
    </div>

    <!-- Skills List -->
    <div class="card">
        <div class="card-header">Daftar Skills ({{ $skills->count() }})</div>
        <div style="overflow-x:auto">
            <table>
                <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Kategori</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr>
                            <td style="font-weight:500">{{ $skill->name }}</td>
                            <td><span class="tag">{{ $skill->category }}</span></td>
                            <td>
                                <div style="display:flex;align-items:center;gap:8px">
                                    <div style="flex:1;height:4px;background:rgba(255,255,255,0.1);border-radius:2px;overflow:hidden;min-width:60px">
                                        <div style="height:100%;background:var(--gold);width:{{ $skill->level }}%;border-radius:2px"></div>
                                    </div>
                                    <span style="color:var(--muted);font-size:0.75rem">{{ $skill->level }}%</span>
                                </div>
                            </td>
                            <td>
                                <div style="display:flex;gap:8px">
                                    <button onclick="editSkill({{ $skill->id }}, '{{ $skill->name }}', {{ $skill->level }}, '{{ $skill->category }}', {{ $skill->order }})" class="btn btn-ghost" style="padding:4px 10px;font-size:0.75rem">Edit</button>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Hapus skill ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="padding:4px 10px;font-size:0.75rem">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:24px">Belum ada skill</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="edit-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.7);z-index:200;display:none;align-items:center;justify-content:center">
    <div style="background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:28px;width:400px;max-width:90vw">
        <h3 style="margin-bottom:20px;font-size:1rem">Edit Skill</h3>
        <form id="edit-form" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" id="edit-name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Kategori</label>
                <select id="edit-category" name="category" class="form-control">
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Tools">Tools</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Database">Database</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Level: <span id="edit-level-val">80</span>%</label>
                <input type="range" id="edit-level" name="level" min="0" max="100" oninput="document.getElementById('edit-level-val').textContent=this.value">
            </div>
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" id="edit-order" name="order" class="form-control" min="0">
            </div>
            <div style="display:flex;gap:10px;margin-top:8px">
                <button type="submit" class="btn btn-gold">Simpan</button>
                <button type="button" onclick="closeModal()" class="btn btn-ghost">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function editSkill(id, name, level, category, order) {
    document.getElementById('edit-form').action = `/admin/skills/${id}`;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-level').value = level;
    document.getElementById('edit-level-val').textContent = level;
    document.getElementById('edit-category').value = category;
    document.getElementById('edit-order').value = order;
    document.getElementById('edit-modal').style.display = 'flex';
}
function closeModal() { document.getElementById('edit-modal').style.display = 'none'; }
document.getElementById('edit-modal').addEventListener('click', function(e) { if(e.target===this) closeModal(); });
</script>
@endsection


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
