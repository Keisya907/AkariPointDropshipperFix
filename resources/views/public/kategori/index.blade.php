@extends('layoutes.public.app')

@section('content')
<style>
/* 🌸 GENERAL */
body {
  font-family: 'Poppins', sans-serif;
  background-color: #f8f6ff;
  color: #2d2d2d;
}

/* 🌸 HEADER */
.display-6 {
  color: #4a3d75;
  font-weight: 700;
}
.text-muted {
  color: #7b6fa6 !important;
}

/* 🌸 CATEGORY CARD */
.category-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  border: 1px solid rgba(174, 148, 255, 0.25);
  transition: all 0.3s ease;
  height: 100%;
  text-decoration: none;
  color: inherit;
  display: block;
}
.category-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 30px rgba(140, 120, 230, 0.15);
}

/* 🌸 IMAGE */
.category-card-img-wrapper {
  width: 100%;
  height: 200px;
  overflow: hidden;
  background: linear-gradient(135deg, #d8c4ff 0%, #ede4ff 100%);
}
.category-card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .3s ease;
}
.category-card:hover .category-card-img {
  transform: scale(1.08);
}

/* 🌸 BODY */
.category-card-body {
  padding: 20px;
  text-align: center;
}
.category-card-title {
  font-size: 18px;
  font-weight: 700;
  color: #1e1e1e;
  margin-bottom: 8px;
}
.category-card-desc {
  font-size: 14px;
  color: #7b6fa6;
  height: 40px;
  overflow: hidden;
}

/* 🌸 PRODUCT CARD - ENHANCED */
.product-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  border: 2px solid rgba(174, 148, 255, 0.3);
  transition: all 0.3s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 35px rgba(140, 120, 230, 0.2);
  border-color: #a88bff;
}

/* 🌸 PRODUCT IMAGE */
.product-img-wrapper {
  width: 100%;
  height: 280px;
  overflow: hidden;
  background: linear-gradient(135deg, #d8c4ff 0%, #ede4ff 100%);
  position: relative;
}
.product-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}
.product-card:hover .product-img {
  transform: scale(1.1);
}

/* 🌸 PRODUCT BADGE */
.product-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
  color: white;
  padding: 6px 14px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  box-shadow: 0 3px 10px rgba(140, 108, 255, 0.4);
}

/* 🌸 PRODUCT BODY */
.product-card-body {
  padding: 20px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}
.product-title {
  font-size: 17px;
  font-weight: 700;
  color: #2d2d2d;
  margin-bottom: 10px;
  line-height: 1.4;
  height: 48px;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
.product-price {
  font-size: 20px;
  font-weight: 700;
  color: #8c6cff;
  margin-bottom: 15px;
  margin-top: auto;
}
.product-price-label {
  font-size: 12px;
  color: #7b6fa6;
  font-weight: 500;
  display: block;
  margin-bottom: 4px;
}

/* 🌸 PRODUCT BUTTON */
.btn-detail {
  width: 100%;
  background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
  border: none;
  color: white;
  padding: 12px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(140, 108, 255, 0.3);
}
.btn-detail:hover {
  background: linear-gradient(135deg, #8c6cff 0%, #7554ff 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(140, 108, 255, 0.4);
}

/* 🌸 RESPONSIVE */
@media (max-width: 768px) {
  .category-card-img-wrapper {
    height: 180px;
  }
  .category-card-title {
    font-size: 16px;
  }
  .product-img-wrapper {
    height: 240px;
  }
  .product-title {
    font-size: 15px;
    height: 42px;
  }
  .product-price {
    font-size: 18px;
  }
}

/* 🌸 FORM & BUTTON */
form .form-control, form .form-select {
  border-radius: 12px;
  border: 2px solid rgba(174, 148, 255, 0.3);
  box-shadow: 0 2px 8px rgba(174, 148, 255, 0.1);
  padding: 12px 16px;
  font-size: 15px;
}
form .form-control:focus, form .form-select:focus {
  border-color: #a88bff;
  box-shadow: 0 0 12px rgba(168, 139, 255, 0.4);
  outline: none;
}
.btn-search {
  min-width: 120px;
  flex-shrink: 0;
  transition: all 0.3s ease;
  background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
  border: none;
  color: white;
  font-weight: 600;
  padding: 12px 24px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(140, 108, 255, 0.3);
}
.btn-search:hover {
  background: linear-gradient(135deg, #8c6cff 0%, #7554ff 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(140, 108, 255, 0.4);
}
form .form-select {
  height: 50px;
  padding: 0 16px;
}

/* 🌸 PAGINATION STYLING */
.pagination {
  gap: 8px;
}
.pagination .page-link {
  border-radius: 10px;
  border: 2px solid rgba(174, 148, 255, 0.3);
  color: #8c6cff;
  font-weight: 600;
  padding: 8px 16px;
  transition: all 0.3s ease;
}
.pagination .page-link:hover {
  background: linear-gradient(135deg, #d8c4ff 0%, #ede4ff 100%);
  border-color: #a88bff;
  color: #8c6cff;
}
.pagination .page-item.active .page-link {
  background: linear-gradient(135deg, #a88bff 0%, #8c6cff 100%);
  border-color: #8c6cff;
}

/* 🌸 NO PRODUCTS MESSAGE */
.no-products {
  text-align: center;
  padding: 60px 20px;
  color: #7b6fa6;
}
.no-products-icon {
  font-size: 64px;
  margin-bottom: 20px;
  opacity: 0.5;
}
</style>

<div class="container py-5">
  <!-- HEADER -->
  <div class="text-center mb-5">
    <h1 class="display-6 fw-bold mb-2">Produk Akari Point Dropshipper</h1>
    <p class="text-muted">Temukan berbagai merchandise Jepang berdasarkan kategori favoritmu 🌸</p>
    <p style="font-size: 16px; color:#4a3d75; font-weight:500;">楽しいお買い物を！🛍️</p>
  </div>

  <!-- FILTER & SEARCH -->
  <div class="row mb-5 g-3">
    <div class="col-12 col-md-8">
      <form action="{{ route('kategori.search') }}" method="GET" class="d-flex w-100 gap-2">
        <input type="text" name="keyword" class="form-control" placeholder="🔍 Cari produk atau kategori...">
        <button class="btn btn-search">Cari</button>
      </form>
    </div>
    <div class="col-12 col-md-4">
      <form action="{{ route('kategori.filter') }}" method="GET">
        <select name="filter_kategori" class="form-select" onchange="this.form.submit()">
          <option value="">📂 Filter berdasarkan kategori</option>
          @foreach($categories as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
          @endforeach
        </select>
      </form>
    </div>
  </div>

  <!-- PRODUK GRID -->
  <div class="row g-4">
    @forelse($products as $product)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="product-card">
          <div class="product-img-wrapper">
            @if($product->foto)
              <img src="{{ asset('storage/' . $product->foto) }}" class="product-img" alt="{{ $product->nama_produk }}">
            @else
              <div class="d-flex align-items-center justify-content-center h-100" style="font-size: 48px; color: #a88bff;">
                📦
              </div>
            @endif
            <span class="product-badge">✨ New</span>
          </div>
          <div class="product-card-body">
            <h5 class="product-title">{{ $product->nama_produk }}</h5>
            <div class="mt-auto">
              <span class="product-price-label">Harga</span>
              <div class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</div>
              <a href="{{ route('produk.detail', $product->id) }}" class="btn btn-detail">
                🛍️ Lihat Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <div class="no-products">
          <div class="no-products-icon">🌸</div>
          <h4 style="color: #7b6fa6; font-weight: 600;">Belum ada produk tersedia</h4>
          <p>Produk akan segera hadir! 💜</p>
        </div>
      </div>
    @endforelse
  </div>

  <!-- PAGINATION -->
  @if($products->hasPages())
    <div class="mt-5 d-flex justify-content-center">
      {{ $products->links() }}
    </div>
  @endif
</div>
@endsection