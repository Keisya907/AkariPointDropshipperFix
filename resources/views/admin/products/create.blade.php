@extends('layoutes.admin.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Tambah Produk</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" required>
                </div>

                {{-- Kategori --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                {{-- Stok --}}
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                {{-- Link Beli (Tambahan) --}}
                <div class="mb-3">
                    <label class="form-label">Link Beli (Opsional)</label>
                    <input 
                        type="url" 
                        name="link" 
                        class="form-control" 
                        placeholder="https://shopee.co.id/produk-anda atau https://wa.me/628xxxx..."
                    >
                    <small class="text-muted">
                        Masukkan link marketplace/WhatsApp. Biarkan kosong jika ingin pakai sistem checkout internal.
                    </small>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tulis deskripsi produk..."></textarea>
                </div>

                {{-- Foto Produk --}}
                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">*Opsional, jika kosong akan pakai gambar default.</small>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">+ Tambah Produk</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
