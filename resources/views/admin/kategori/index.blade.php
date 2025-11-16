@extends('layoutes.admin.app')
@section('title', 'Daftar Kategori')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
        <h3 class="fw-bold mb-0" style="color: #2d2053; letter-spacing: 0.3px;">Daftar Kategori</h3>

        <div class="d-flex align-items-center gap-2">
            <form action="{{ route('admin.kategori.index') }}" method="GET" class="me-2">
                <input type="text" name="search" class="form-control search-input"
                       placeholder="Cari kategori..." value="{{ request('search') }}">
            </form>
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-add">+ Tambah Kategori</a>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    @endif

    <div class="card kategori-card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="220" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $item->nama_kategori }}</td>
                            <td class="text-muted">{{ $item->deskripsi ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-sm btn-edit">Edit</a>
                                <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-delete">Hapus</button>
                                </form>
                                <a href="{{ route('admin.kategori.show', $item->id) }}" class="btn btn-sm btn-detail">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
body {
    background-color: #f9f8ff;
    font-family: 'Poppins', sans-serif;
}

/* Card */
.kategori-card {
    border-radius: 10px;
    overflow: hidden;
    border: 1.5px solid #dcd3f0;
    background: #ffffff;
    margin-top: 15px;
}

/* Table */
.table {
    font-size: 14px;
}
.table thead {
    background: #2d2053;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
}
.table th, .table td {
    padding: 12px 14px;
    vertical-align: middle;
}
.table tbody tr {
    border-bottom: 1px solid #eee;
}
.table tbody tr:hover {
    background-color: #f5f1ff;
    transition: 0.2s ease;
}

/* Buttons */
.btn-add {
    background-color: #2d2053;
    border: none;
    border-radius: 6px;
    color: #fff;
    padding: 8px 16px;
    font-weight: 500;
    transition: 0.2s ease;
}
.btn-add:hover {
    background-color: #3a2c70;
}

.btn-edit {
    background-color: #f5c842;
    color: #000;
    border: none;
    border-radius: 5px;
    padding: 4px 10px;
    font-size: 13px;
}
.btn-delete {
    background-color: #d9534f;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 4px 10px;
    font-size: 13px;
}
.btn-detail {
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 4px 10px;
    font-size: 13px;
}
.btn-edit:hover, .btn-delete:hover, .btn-detail:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

/* Search input */
.search-input {
    border-radius: 6px;
    border: 1.8px solid #2d2053;
    padding: 8px 12px;
    font-size: 14px;
}
.search-input:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(45, 32, 83, 0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .table {
        font-size: 13px;
    }
}
</style>
@endsection
