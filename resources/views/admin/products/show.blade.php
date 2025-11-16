@extends('layoutes.admin.app')
@section('title', 'Detail Produk')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0">Detail Produk</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($product->foto)
                        <img src="{{ asset('storage/' . $product->foto) }}" 
                             alt="{{ $product->nama_produk }}" 
                             class="img-fluid rounded shadow-sm mb-3">
                    @else
                        <img src="{{ asset('images/nophoto.jpg') }}" 
                             alt="Tidak ada foto" 
                             class="img-fluid rounded shadow-sm mb-3">
                    @endif
                </div>

                <div class="col-md-8">
                    <h4 class="fw-bold">{{ $product->nama_produk }}</h4>
                    <p><strong>Kategori:</strong> {{ $product->category->nama_kategori ?? '-' }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $product->stok }}</p>
                    <p><strong>Deskripsi:</strong><br>{{ $product->deskripsi ?? '-' }}</p>
<p><strong>Link Beli:</strong><br>
    @if ($product->link)
        <a href="{{ $product->link }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="btn btn-primary btn-sm mt-1">
            🔗 Buka Link
        </a>
        <p class="text-muted mt-1">{{ $product->link }}</p>
    @else
        <span class="text-muted">Tidak ada link</span>
    @endif
</p>

                    <div class="mt-4">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
