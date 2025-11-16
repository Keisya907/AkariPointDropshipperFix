@extends('layouts.public')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Daftar Produk</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($product->foto)
                        <img src="{{ asset('storage/' . $product->foto) }}" class="card-img-top" alt="{{ $product->nama_produk }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nama_produk }}</h5>
                        <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <a href="{{ route('produk.detail', $product->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
