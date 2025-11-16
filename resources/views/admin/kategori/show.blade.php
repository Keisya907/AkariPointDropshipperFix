@extends('layoutes.admin.app')
@section('title', 'Detail Kategori')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Detail Kategori</h3>

    <div class="card shadow-sm p-4">
        <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
        <p><strong>Deskripsi:</strong> {{ $kategori->deskripsi ?? '-' }}</p>

        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>

@endsection
