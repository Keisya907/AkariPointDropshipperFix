@extends('layoutes.admin.app')
@section('title', 'Daftar Produk')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f6ff;
        color: #2d2d2d;
    }
    h3.fw-bold {
        color: #4a3d75;
        font-weight: 700;
    }
    .btn {
        border-radius: 8px !important;
        font-weight: 500;
        padding: 8px 14px;
    }
    .btn-primary { background-color: #6a4fbf; border: none; }
    .btn-primary:hover { background-color: #5a43a5; }
    .btn-warning { background-color: #f5b942; border: none; color: #fff; }
    .btn-warning:hover { background-color: #e0a832; }
    .btn-danger { background-color: #e74c3c; border: none; }
    .btn-danger:hover { background-color: #d63d2d; }
    .btn-info { background-color: #3498db; border: none; color: #fff; }
    .btn-info:hover { background-color: #2980b9; }
    input.form-control { border-radius: 8px; border: 1px solid #c9bff3; }
    input.form-control:focus { border-color: #8b75e8; }
    .card { border-radius: 16px; border: none; margin-top: 25px; overflow: hidden; box-shadow: 0 4px 12px rgba(74,61,117,0.1); }
    .table thead { background-color: #4a3d75; color: #fff; }
    .table td, .table th { vertical-align: middle; font-size: 14px; padding: 12px; }
    .table img { border-radius: 10px; }
    .container { margin-top: 40px; }
    .alert { border-radius: 8px; }
    .description-cell {
        max-width: 350px;
        max-height: 100px;
        overflow-y: auto;
        white-space: pre-line;
        font-size: 13px;
        line-height: 1.5;
        padding: 8px;
        background-color: #f9f9f9;
        border-radius: 6px;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0">Daftar Produk</h3>
        <div class="d-flex align-items-center">
            <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex me-2">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nama produk..." value="{{ request('search') }}">
            </form>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Link</th>
                        <th style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td class="text-center">
                            @if($product->foto)
                                <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto produk" width="80">
                            @else
                                <img src="{{ asset('images/nophoto.jpg') }}" alt="Tidak ada foto" width="80">
                            @endif
                        </td>

                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->category->nama_kategori ?? '-' }}</td>
                        <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>
                            @if($product->deskripsi)
                                <div class="description-cell">
                                    {{ $product->deskripsi }}
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
    @if ($product->link)
        <a href="{{ $product->link }}" target="_blank" class="btn btn-sm btn-primary">
            Buka Link
        </a>
    @else
        <span class="text-muted">-</span>
    @endif
</td>

                        <td>
                            <!-- Tombol SHOW -->
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm text-white">Show</a>

                            <!-- Tombol EDIT -->
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol DELETE -->
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection