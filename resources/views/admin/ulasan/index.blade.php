@extends('layoutes.admin.app')
@section('title', 'Moderasi Ulasan')

@section('content')
<style>
    /* 🌿 Konsistensi style antar halaman admin */
    .page-header {
        margin-bottom: 24px;
    }

    .page-header h3 {
        font-weight: 700;
        color: #1e3a5f;
    }

    /* Search Form */
    .search-form input {
        border-radius: 6px;
        border: 1px solid #1e3a5f;
        padding: 6px 10px;
        font-size: 14px;
        width: 230px;
    }

    .search-form input:focus {
        border-color: #1e3a5f !important;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 95, 0.25) !important;
    }

    .search-form .btn {
        border-radius: 6px;
        padding: 6px 14px;
        font-weight: 500;
        background-color: #1e3a5f;
        border: none;
    }

    .search-form .btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }

    /* Table */
    .table th,
    .table td {
        font-size: 14px;
        vertical-align: middle;
        padding: 12px;
    }

    .table th {
        background-color: #1e3a5f !important;
        color: #fff !important;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    /* Buttons */
    .btn-sm {
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Card */
    .card {
        border-radius: 10px;
        border: none;
        overflow: hidden;
    }

    .card-body {
        padding: 0;
    }

    /* Container */
    .container.py-4 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center page-header">
        <h3 class="fw-bold mb-0">Moderasi Ulasan</h3>
        <form action="{{ route('admin.ulasan.index') }}" method="GET" class="d-flex search-form">
            <input type="text" name="search" class="form-control me-2"
                   placeholder="Cari nama / menu..." value="{{ request('search') }}">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $u)
                        <tr style="border-bottom: 1px solid #e0e0e0;">
                            <td>{{ $u->menu->nama_menu ?? '-' }}</td>
                            <td>{{ $u->nama }}</td>
                            <td>{{ $u->rating }}/5</td>
                            <td>{{ $u->komentar }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.ulasan.delete', $u->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada ulasan untuk dimoderasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
