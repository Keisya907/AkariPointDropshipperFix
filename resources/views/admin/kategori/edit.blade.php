@extends('layoutes.admin.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Edit Kategori</h2>

   <form action="{{ route('admin.kategori.update', $category) }}" method="POST" class="card shadow-sm p-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori"
               class="form-control @error('nama_kategori') is-invalid @enderror"
               value="{{ old('nama_kategori', $category->nama_kategori) }}">
        @error('nama_kategori')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $category->deskripsi) }}</textarea>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

</div>
@endsection
