@extends('layoutes.admin.app')
@section('title', 'Edit Produk')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-3">Edit Produk</h3>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}">
        </div>
<!-- 🔥 Field LINK ditambah di sini -->
        <div class="mb-3">
            <label class="form-label">Link Produk</label>
            <input type="text" name="link" class="form-control"
                value="{{ old('link', $product->link) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $product->harga) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $product->stok) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Produk</label><br>
            @if ($product->foto)
                <img src="{{ asset('storage/' . $product->foto) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
