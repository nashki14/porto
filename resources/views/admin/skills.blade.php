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